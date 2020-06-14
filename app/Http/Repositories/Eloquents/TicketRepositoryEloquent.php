<?php

namespace App\Http\Repositories\Eloquents;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Http\Repositories\Contracts\TicketRepository;
use App\Models\Ticket;
use App\Validators\TicketValidator;

/**
 * Class TicketRepositoryEloquent.
 *
 * @package namespace App\Http\Repositories\Eloquents;
 */
class TicketRepositoryEloquent extends BaseRepository implements TicketRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Ticket::class;
    }

    /**
     * Specify Validator class name
     *
     * @return mixed
     */
    public function validator()
    {

        return TicketValidator::class;
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
        $model = $this->model();
        $tickets = $model::where('attribute_set_id', 2);

        if (isset($options['leadId']) && $options['leadId']) {
            $tickets = $tickets->whereAttribute('lead_id', $options['leadId']);
        }

        if (isset($options['withAttributes']) && $options['withAttributes']) {
            $tickets = $tickets->whereAttribute('lead_id', $options['leadId']);
        }

        return $tickets->get(["*", "attr.*"]);
    }

    public function getById($id)
    {
        $model = $this->model();
        $ticket = $model::select(["*", "attr.*"])->find($id);

        return $ticket;
    }

    public function createTemp($data)
    {
        $model = new $this->model();
        $model->fill($data);

        return $model;
    }

    public function create($data)
    {
        $model = new $this->model();
        $model->fill($data);
        $model->save();
        return $model;
    }
}
