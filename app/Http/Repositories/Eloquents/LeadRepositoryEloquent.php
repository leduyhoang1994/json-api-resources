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
            $model = $model->with("ticket");
        }

        if (isset($options['assigned-to-me']) && $options['assigned-to-me']) {
            $user = Auth::user();
            $model = $model->where("current_agent_id", $user->id);
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
        return $model::where("id", $id)->update($data);
    }
}