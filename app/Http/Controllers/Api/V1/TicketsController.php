<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Contracts\TicketNoteRepository;
use App\Models\Ticket;
use Eav\Attribute;
use Eav\AttributeOption;
use Eav\EntityAttribute;
use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\TicketCreateRequest;
use App\Http\Requests\TicketUpdateRequest;
use App\Http\Repositories\Contracts\TicketRepository;
use App\Models\TicketNoteType;
use App\Validators\TicketValidator;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class TicketsController.
 *
 * @package namespace App\Http\Controllers\Api\V1;
 */
class TicketsController extends Controller
{
    /**
     * @var TicketRepository
     */
    protected $repository;

    /**
     * @var TicketValidator
     */
    protected $validator;

    /**
     * @var TicketNoteRepository
     */
    protected $ticketNoteRepository;

    /**
     * TicketsController constructor.
     *
     * @param TicketRepository $repository
     * @param TicketValidator $validator
     * @param TicketNoteRepository $ticketNoteRepository
     */
    public function __construct(TicketRepository $repository, TicketValidator $validator, TicketNoteRepository $ticketNoteRepository)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->ticketNoteRepository = $ticketNoteRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        //        $this->createAttribute();
        //        Ticket::create([
        //            'lead_id' => 33,
        //            'status' => 1
        //        ]);
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $tickets = $this->repository->all(['attr.*']);

        $paymentAcceptanceAttr = Attribute::findByCode('payment_acceptance', 'ticket');
        $paymentAcceptanceAttr->load('optionValues');

        $paymentAcceptanceAttr->frontend_type; // This will return the type in this case 'select'

        $options = $paymentAcceptanceAttr->options();

        $entity = \Eav\Entity::findByCode('ticket');

        $attributes = $entity->attributes;
        return $this->responseSuccess($attributes);
    }

    public function createOne()
    {
        $ticket = Ticket::create([
            'lead_id' => 1,
            'attribute_set_id' => 2
        ]);

        return $this->responseSuccess($ticket);
    }

    public function create(Request $request)
    {
        $defaultAttributeSet = 2;
        // $attributes = 
    }

    public function update(Request $request, $id)
    {
        $ticket = $this->repository->getById($id);
        if (!$ticket) {
            return $this->responseError(404, "Ticket not found");
        }
        $entity = \Eav\Entity::findByCode('ticket');

        $attributeSet = $entity->attributeSet->filter(function ($set) use ($ticket) {
            return $set->attribute_set_id == $ticket->attribute_set_id;
        })->first();

        if ($attributeSet) {
            $attributeSet = $attributeSet->load('attributeGroup.attributes.optionValues');
        }
        
        $ticket->fill($request->all());
        foreach ($attributeSet->attributeGroup as $group) {
            foreach ($group->attributes as $attribute) {
                $code = $attribute->attribute_code;
                if ($request->has($code)) {
                    if ($attribute->backend_type === "integer") {
                        $ticket->$code = intval($request->get($code));
                    } else {
                        $ticket->$code = $request->get($code);
                    }
                }
            }
        }
        $dirty = $ticket->getDirty();
        $changes = [];
        if (count($dirty) > 0)
        {
            foreach($dirty as $attr => $val) {
                $changes[$attr]["from"] = $ticket->getOriginal($attr);
                $changes[$attr]["to"] = $val;
            }
            try {
                DB::beginTransaction();
                $ticket->save();
                $noteType = TicketNoteType::getType(isset($changes['current_level_id']) ? TicketNoteType::UPDATE_LEVEL : TicketNoteType::UPDATE_TICKET);
                $this->ticketNoteRepository->create([
                    'ticket_id' => $id,
                    'note_type' => $noteType->id,
                    'current_level' => $ticket->current_level,
                    'current_level_id' => $ticket->current_level_id,
                    'note' => $request->has('agent_note') ? $request->get('agent_note') : $noteType->label,
                    'ticket_data' => json_encode([
                        'ticket' => $ticket,
                        'changes' => $changes
                    ])
                ]);
                DB::commit();
            } catch (Exception $ex) {
                DB::rollback();
                throw $ex;
                return $this->responseError(500, "Something wrongs");
            }
        }

        return $this->responseSuccess($ticket);
    }
}
