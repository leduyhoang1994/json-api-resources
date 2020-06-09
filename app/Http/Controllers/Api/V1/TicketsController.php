<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
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
use App\Validators\TicketValidator;

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
     * TicketsController constructor.
     *
     * @param TicketRepository $repository
     * @param TicketValidator $validator
     */
    public function __construct(TicketRepository $repository, TicketValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  TicketCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(TicketCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $ticket = $this->repository->create($request->all());

            $response = [
                'message' => 'Ticket created.',
                'data' => $ticket->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error' => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ticket = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $ticket,
            ]);
        }

        return view('tickets.show', compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ticket = $this->repository->find($id);

        return view('tickets.edit', compact('ticket'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  TicketUpdateRequest $request
     * @param  string $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(TicketUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $ticket = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Ticket updated.',
                'data' => $ticket->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error' => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Ticket deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Ticket deleted.');
    }
}
