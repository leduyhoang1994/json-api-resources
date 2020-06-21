<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Contracts\AgentGroupRepository;
use App\Http\Repositories\Contracts\UserRepository;
use App\Validators\AgentGroupValidator;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class AgentGroupController extends Controller
{
	protected $repository, $userRepository;

	public function __construct(AgentGroupRepository $agentGroupRepository, UserRepository $userRepository)
	{
		$this->repository = $agentGroupRepository;
		$this->userRepository = $userRepository;
	}

	public function getAll()
	{
		$agentGroups = $this->repository->getDataBy([
			'with-agents' => true,
			'with-leader' => true
		]);
		return $this->responseSuccess($agentGroups);
	}

	public function getOne($id)
	{
		$agentGroup = $this->repository->getDataBy([
			'with-agents' => true,
			'with-leader' => true,
			'id' => $id
		]);
		return $this->responseSuccess($agentGroup);
	}

	public function create(Request $request)
	{
		try {
			$agentGroup = $this->repository->create($request->all());
			return $this->responseSuccess($agentGroup);
		} catch (ValidatorException $exception) {
			return $this->responseError(400, $exception->getMessageBag()->first());
		} catch (\Exception $exception) {
			return $this->responseError(400, $exception->getMessage());
		}
	}

	public function update($id, Request $request)
	{
		try {
			$agentGroup = $this->repository->update($request->all(), $id);
			$agentGroup->load('agents');
			return $this->responseSuccess($agentGroup);
		} catch (ValidatorException $exception) {
			return $this->responseError(400, $exception->getMessageBag()->first());
		} catch (\Exception $exception) {
			return $this->responseError(400, $exception->getMessage());
		}
	}

	public function delete($id, Request $request)
	{
		try {
			$agentGroup = $this->repository->delete($id);
			return $this->responseSuccess($agentGroup);
		} catch (\Exception $exception) {
			return $this->responseError(400, $exception->getMessage());
		}
	}

	public function addAgents($id, Request $request)
	{
		if (!$request->has('agents') || !is_array($request->get('agents'))) {
			return $this->responseError(400, 'Agents array is required');
		}

		$group = $this->repository->find($id);
		$group->agents()->sync($request->get('agents'));
		$group = $group->load('agents');

		return $this->responseSuccess($group);
	}
}
