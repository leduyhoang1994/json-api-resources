<?php

namespace App\Http\Repositories\Eloquents;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Http\Repositories\Contracts\LeadRepository;
use App\Models\Lead;
use App\Validators\LeadValidator;

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

    public function getDataBy($option = [])
    {
        $model = $this->model();
        $leads = $model::all();

        return $leads;
    }

    public function getById($id)
    {
        $model = $this->model();
        $lead = $model::find($id);

        return $lead;
    }
}
