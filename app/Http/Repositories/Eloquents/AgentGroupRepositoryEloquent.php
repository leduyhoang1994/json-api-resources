<?php

namespace App\Http\Repositories\Eloquents;

use App\Validators\AgentGroupValidator;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Http\Repositories\Contracts\AgentGroupRepository;
use App\Models\AgentGroup;

/**
 * Class AgentGroupRepositoryEloquent.
 *
 * @package namespace App\Http\Repositories\Eloquents;
 */
class AgentGroupRepositoryEloquent extends BaseRepository implements AgentGroupRepository
{
	/**
	 * Specify Model class name
	 *
	 * @return string
	 */
	public function model()
	{
		return AgentGroup::class;
	}

	/**
	 * Specify Validator class name
	 *
	 * @return mixed
	 */
	public function validator()
	{

		return AgentGroupValidator::class;
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
		$model = new $this->model();

		if (isset($options['with-agents']) && $options['with-agents']) {
			$model = $model->with('agents');
		}

		if (isset($options['with-leader']) && $options['with-leader']) {
			$model = $model->with('leader');
		}

		if (isset($options['id']) && $options['id']) {
			$model = $model->where("id", $options['id']);
			return $model->first();
		}

		return $model->get();
	}

	public function update(array $attributes, $id)
	{
		$group = parent::update($attributes, $id);
		if (isset($attributes['agents'])) {
			$userIds = array_column($attributes['agents'], 'id');
			$group->agents()->sync($userIds);
		}
		return $group;
	}

}
