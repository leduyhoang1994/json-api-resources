<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Contracts\LeadRepository;
use App\Http\Repositories\Contracts\TicketRepository;
use App\Models\Lead;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LeadController extends Controller
{
	/**
	 * @var LeadRepository
	 */
	protected $repository;
	/**
	 * @var TicketRepository
	 */
	protected $ticketRepository;

	public function __construct(LeadRepository $repository, TicketRepository $ticketRepository)
	{
		$this->repository = $repository;
		$this->ticketRepository = $ticketRepository;
	}

	public function getMine()
	{
		$leads = $this->repository->getDataBy([
			"with-ticket" => true,
			"assigned-to-me" => true
		]);

		return $this->responseSuccess($leads);
	}

	private function getByRequest($request)
	{
		return [
			"with-ticket" => true,
			"with-agent" => true,
			"page-size" => $request->has("per_page") ? $request->get("per_page") : null,
			"current-page" => $request->has("page") ? $request->get("page") : 1,
			"show-not-assigned" => $request->has("showNotAssigned") ? $request->get("showNotAssigned") : null,
			"search" => $request->has("search") ? $request->get("search") : null,
		];
	}

	public function getAll(Request $request)
	{
		$leads = $this->repository->getDataBy($this->getByRequest($request));

		return $this->responseSuccess($leads);
	}

	public function getOne($id)
	{
		$lead = $this->repository->getById($id);

		return $this->responseSuccess($lead);
	}

	public function getTickets($id)
	{
		$tickets = $this->ticketRepository->getDataBy([
			"leadId" => $id
		]);
		$sets = [];
		if ($tickets) {
			$entity = \Eav\Entity::findByCode('ticket');

			$sets = $entity->attributeSet->load(['attributeGroup.attributes.optionValues', 'attributeGroup.processRules']);
		}
		return $this->responseSuccess([
			"tickets" => $tickets,
			"attributeSet" => $sets
		]);
	}

	public function getCurrentTicket($id)
	{
		$lead = $this->repository->getById($id);
		if (!$lead || !$lead->current_ticket_id) {
			return $this->responseSuccess(null);
		}

		$ticket = $this->ticketRepository->getById($lead->current_ticket_id);
		if (!$ticket) {
			return $this->responseSuccess(null);
		}

		$entity = \Eav\Entity::findByCode('ticket');
		$sets = $entity->attributeSet->load(['attributeGroup.attributes.optionValues', 'attributeGroup.processRules']);

		return $this->responseSuccess([
			"ticket" => $ticket,
			"attributeSet" => $sets
		]);
	}

	public function createTicket($id)
	{
		$lead = $this->repository->getById($id);
		if ($lead && $lead->current_ticket_id) {
			//Close current ticket
			$this->ticketRepository->update([
				'status' => 0
			], $lead->current_ticket_id);
		}
		$defaultAttributeSet = 2;
		$ticket = $this->ticketRepository->create([
			'lead_id' => $id,
			'attribute_set_id' => $defaultAttributeSet,
			'status' => 1
		]);

		$entity = \Eav\Entity::findByCode('ticket');
		$sets = $entity->attributeSet->load(['attributeGroup.attributes.optionValues', 'attributeGroup.processRules']);

		$this->repository->update($id, [
			'current_ticket_id' => $ticket->id
		]);

		return $this->responseSuccess([
			"ticket" => $ticket,
			"attributeSet" => $sets
		]);
	}

	public function importLeads(Request $request)
	{
		try {
			$uploadFile = $request->file("file");
			$path = $uploadFile->getPathName();
			$reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader("Xlsx");
			$reader->setReadDataOnly(true);
			$reader->setLoadSheetsOnly("L1 Raw MKT");
			$spreadsheet = $reader->load($path);
			$worksheet = $spreadsheet->getActiveSheet();
			$batch = generateRandomString();
			$rows = [];
			$mapping = [
				"Họ và tên" => [
					"field" => "name"
				],
				"SĐT" => [
					"field" => "phone",
				],
				"Ghi chú" => [
					"field" => "note",
				],
				"Điểm tập" => [
					"field" => "train_location",
				],
				"Page" => [
					"field" => "page",
				],
				"Quận" => [
					"field" => "district",
				],
				"Sản phẩm" => [
					"field" => "product",
				],
				"Ngày về data" => [
					"field" => "lead_date",
					"format" => function ($val) {
						if (!$val) {
							return null;
						}
						$timestamp = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToTimestamp($val);
						return new \Carbon\Carbon($timestamp);
					}
				],
			];
			$leadMapping = [];
			$leadsData = [];
			DB::beginTransaction();
			foreach ($worksheet->getRowIterator() as $rowIdx => $row) {
				$cellIterator = $row->getCellIterator();
				$cellIterator->setIterateOnlyExistingCells(TRUE); // This loops through all cells,
				$leadData = (new Lead())->toArray();
				foreach ($cellIterator as $cellIdx => $cell) {
					$cellVal = $cell->getCalculatedValue();
					if ($rowIdx == 1) {
						if (isset($mapping[$cellVal])) {
							$mapping[$cellVal]["index"] = $cellIdx;
							$leadMapping[$cellIdx]["field"] = $mapping[$cellVal]["field"];
							if (isset($mapping[$cellVal]["format"])) {
								$leadMapping[$cellIdx]["format"] = $mapping[$cellVal]["format"];
							}
						}
					} else {
						if (isset($leadMapping[$cellIdx])) {
							$formatVal = isset($leadMapping[$cellIdx]["format"]) ? $leadMapping[$cellIdx]["format"]($cellVal) : $cellVal;
							$leadData[$leadMapping[$cellIdx]["field"]] = $formatVal;
						}
					}
				}
				if (count($leadData) > 0) {
					// $leadData = array_merge($leadData, [
					//   "created_at" =>  \Carbon\Carbon::now(), # new \Datetime()
					//   "updated_at" => \Carbon\Carbon::now(),  # new \Datetime()
					// ]);
					// $leadsData[] = $leadData;
					if (!$this->containsOnlyNull($leadData)) {
						$leadData["import_user_id"] = Auth::id();
						$leadData["batch"] = $batch;
						Lead::create($leadData);
					}
				}
			}
			DB::commit();
			return $this->responseSuccess("Done");
		} catch (Exception $ex) {
			DB::rollback();
			return $this->responseError(500, $ex->getMessage());
		}
	}

	function containsOnlyNull($input)
	{
		return empty(array_filter($input, function ($a) {
			return $a !== null;
		}));
	}

	public function assign(Request $request)
	{
		if (!$request->has("leads") || !$request->has("agent")) {
			return $this->responseError(400, "Bad parameters");
		}

		$result = $this->repository->update($request->get("leads"), [
			'current_agent_id' => $request->get("agent")
		]);

		return $this->responseSuccess($result);
	}

	public function massAssign(Request $request)
	{
		if (!$request->has('agents') && !is_array($request->get('agents'))) {
			$this->responseError(400, "Agents is required");
		}

		$agents = $request->get('agents');

		$result = $this->repository->massAssign($agents);

		return $this->responseSuccess($result);
	}

	public function pendingImport()
	{
		$pendingList = $this->repository->getDataBy([
			'pending-list' => true,
			'import-pending' => true
		]);

		return $this->responseSuccess($pendingList);
	}

	public function pendingDetails($batch)
	{
		$pendingDetail = $this->repository->getDataBy([
			'pending-detail' => $batch,
			'import-pending' => true
		]);

		return $this->responseSuccess($pendingDetail);
	}

	public function cancelBatch($batch)
	{
		$pendingDetail = $this->repository->deleteBy([
			'pending-detail' => $batch
		]);

		return $this->responseSuccess($pendingDetail);
	}

	public function approveBatch($batch)
	{
		$pendingDetail = $this->repository->updateBy([
			'pending-detail' => $batch
		], [
			'import_status' => Lead::IMPORT_STATUS_DONE
		]);

		return $this->responseSuccess($pendingDetail);
	}

	public function getAvailableCount()
	{
		$available = $this->repository->getDataBy([
			'show-not-assigned' => true,
			'count' => true
		]);

		return $this->responseSuccess($available);
	}

	public function export(Request $request)
	{
		$data = $this->getByRequest($request);
		unset($data['page-size']);
		$leads = $this->repository->getDataBy();
		return exportLeads($leads);
	}
}
