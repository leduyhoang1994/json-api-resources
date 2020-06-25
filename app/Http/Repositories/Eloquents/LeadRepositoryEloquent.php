<?php

namespace App\Http\Repositories\Eloquents;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Http\Repositories\Contracts\LeadRepository;
use App\Models\Lead;
use App\Validators\LeadValidator;
use Illuminate\Support\Facades\Auth;

/**
 * Class LeadRepositoryEloquent.
 *
 * @package namespace App\Http\Repositories\Eloquents;
 */
class LeadRepositoryEloquent extends BaseRepository implements LeadRepository
{
	/**
	 * Specify Model class name
	 *
	 * @return string
	 */
	public function model()
	{
		return Lead::class;
	}

	public function validator()
	{
		return LeadValidator::class;
	}


	/**
	 * Boot up the repository, pushing criteria
	 */
	public function boot()
	{
		$this->pushCriteria(app(RequestCriteria::class));
	}

	public function getDataBy($options = [])
	{
		$model = (new $this->model());

		if (isset($options['with-ticket']) && $options['with-ticket']) {
			$model = $model->with('ticket');
		}

		if (isset($options['with-agent']) && $options['with-agent']) {
			$model = $model->with('agent');
		}

		if (isset($options['assigned-to-me']) && $options['assigned-to-me']) {
			$user = Auth::user();
			$model = $model->where('current_agent_id', $user->id);
		}

		if (isset($options['show-not-assigned']) && $options['show-not-assigned']) {
			$model = $model->whereNull('current_agent_id');
		}

		if (isset($options['search']) && $options['search']) {
			$model = $model->where('name', 'like', '%' . $options['search'] . '%');
		}

		if (isset($options['pending-detail']) && $options['pending-detail']) {
			$model = $model->where('batch', $options['pending-detail']);
		}

		if (!isset($options['import-pending'])) {
			$model = $model->where('import_status', Lead::IMPORT_STATUS_DONE);
		}

		if (isset($options['pending-list']) && $options['pending-list']) {
			$model = $model
				->selectRaw('batch, created_at, COUNT(id) AS `leads`, import_user_id, import_status')
				->groupBy('batch')
				->having('import_user_id', Auth::id());
			return $model->get();
		}

		if (isset($options['page-size']) && $options['page-size']) {
			return $model->paginate($options['page-size']);
		}

		if (isset($options['count']) && $options['count']) {
			return $model->count();
		}

		if (isset($options['query']) && $options['query']) {
			return $model;
		}

		$leads = $model->get();
		return $leads;
	}

	public function getById($id)
	{
		$model = $this->model();
		$lead = $model::find($id);

		return $lead;
	}

	public function update($id, $data)
	{
		$model = $this->model();
		if (is_array($id)) {
			return $model::whereIn('id', $id)->update($data);
		}
		$lead = $model::find($id);
		$lead->fill($data)->save();

		return $lead;
	}

	public function deleteBy($options = [])
	{
		$model = $this->model();
		if (isset($options['pending-detail']) && $options['pending-detail']) {
			$model::where('batch', $options['pending-detail'])->delete();
		}

		return true;
	}

	public function updateBy($options, $data)
	{
		$model = $this->model();
		if (isset($options['pending-detail']) && $options['pending-detail']) {
			$model::where('batch', $options['pending-detail'])->update($data);
		}

		return true;
	}

	public function massAssign($agents)
	{
		foreach ($agents as $agent) {
			$this->getDataBy([
				'show-not-assigned' => true,
				'query' => true
			])->limit($agent['quota'])->update([
				'current_agent_id' => $agent['id']
			]);
		}

		return true;
	}
}
