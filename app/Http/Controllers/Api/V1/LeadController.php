<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Contracts\LeadRepository;
use App\Http\Repositories\Contracts\TicketRepository;
use Illuminate\Http\Request;

class LeadController extends Controller
{
  /**
   * @var LeadRepository
   */
  protected $repository;
  /**
   * @var TicketRepository
   */
  protected $ticketRepository;

  public function __construct(LeadRepository $repository, TicketRepository $ticketRepository)
  {
    $this->repository = $repository;
    $this->ticketRepository = $ticketRepository;
  }

  public function getAll()
  {
    $leads = $this->repository->getDataBy();

    return $this->responseSuccess($leads);
  }

  public function getOne($id)
  {
    $lead = $this->repository->getById($id);

    return $this->responseSuccess($lead);
  }

  public function getTickets($id)
  {
    $tickets = $this->ticketRepository->getDataBy([
      "leadId" => $id
    ]);
    $sets = [];
    if ($tickets) {
      $entity = \Eav\Entity::findByCode('ticket');

      $sets = $entity->attributeSet->load('attributeGroup.attributes.optionValues');
    }
    return $this->responseSuccess([
      "tickets" => $tickets,
      "attributeSet" => $sets
    ]);
  }

  public function getCurrentTicket($id)
  {
    $lead = $this->repository->getById($id);
    if (!$lead || !$lead->current_ticket_id) {
      return $this->responseSuccess(null);
    }

    $ticket = $this->ticketRepository->getById($lead->current_ticket_id);
    if (!$ticket) {
      return $this->responseSuccess(null);
    }

    $entity = \Eav\Entity::findByCode('ticket');
    $sets = $entity->attributeSet->load('attributeGroup.attributes.optionValues');

    return $this->responseSuccess([
      "ticket" => $ticket,
      "attributeSet" => $sets
    ]);
  }

  public function createTempTicket($id)
  {
    $defaultAttributeSet = 2;
    $ticket = $this->ticketRepository->createTemp([
      'lead_id' => $id,
      'attribute_set_id' => $defaultAttributeSet
    ]);

    $entity = \Eav\Entity::findByCode('ticket');
    $sets = $entity->attributeSet->load('attributeGroup.attributes.optionValues');

    return $this->responseSuccess([
      "ticket" => $ticket,
      "attributeSet" => $sets
    ]);
  }
}
