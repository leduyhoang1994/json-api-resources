<?php

namespace App\Http\Repositories\Eloquents;

use App\Http\Repositories\Contracts\TicketNoteRepository;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Models\TicketNote;
use App\Validators\TicketValidator;

/**
 * Class TicketNoteRepositoryEloquent.
 *
 * @package namespace App\Http\Repositories\Eloquents;
 */
class TicketNoteRepositoryEloquent extends BaseRepository implements TicketNoteRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return TicketNote::class;
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
        $notes = $model::select(["*"])->with("noteType");

        if (isset($options["ticketId"]) && $options["ticketId"]) {
            $notes = $notes->where("ticket_id", $options["ticketId"]);
        }

        return $notes->orderBy('created_at', 'desc')->get();
    }

    public function getById($id)
    {
        $model = $this->model();
        $note = $model::select(["*"])->find($id);

        return $note;
    }

    public function create($data)
    {
        $model = new $this->model();
        $model->fill($data);
        $model->save();
        return $model;
    }
}
