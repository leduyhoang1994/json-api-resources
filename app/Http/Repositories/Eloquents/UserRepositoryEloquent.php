<?php

namespace App\Http\Repositories\Eloquents;

use App\Http\Repositories\Contracts\UserRepository;
use App\Validators\UserValidator;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Http\Repositories\Contracts\LeadRepository;
use App\Models\User;
use App\Validators\LeadValidator;

/**
 * Class UserRepositoryEloquent.
 *
 * @package namespace App\Http\Repositories\Eloquents;
 */
class UserRepositoryEloquent extends BaseRepository implements UserRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }

	public function validator()
	{
		return UserValidator::class;
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

        if (isset($options['with-agent-groups']) && $options['with-agent-groups']) {
            $model = $model->with("agentGroups");
        }

	    if (isset($options['id']) && $options['id']) {
		    $model = $model->where('id', $options['id']);
		    return $model->first();
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

    public function update($id, $data) {
        $model = $this->model();
        $user = $model::find($id);
        $user->fill($data);
        if (isset($data['agent_groups'])) {
        	$groupIds = array_column($data['agent_groups'], 'id');
        	$user->agentGroups()->sync($groupIds);
        }
        $user->save();
        $user->load("agentGroups");
        return $user;
    }
}
