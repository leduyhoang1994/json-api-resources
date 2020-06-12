<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Contracts\TicketNoteRepository;
use App\Models\TicketNoteType;
use Illuminate\Http\Request;

class TicketNoteController extends Controller
{
    /**
     * @var TicketNoteRepository $repository
     */
    protected $repository;

    public function __construct(TicketNoteRepository $repository)
    {
        $this->repository = $repository;
    }

    public function all(Request $request)
    {
        if (!$request->has("ticketId")) {
            return $this->responseSuccess([]);
        }

        $notes = $this->repository->getDataBy([
            "ticketId" => $request->get("ticketId")
        ]);

        return $this->responseSuccess($notes);
    }

    public function takeNote(Request $request)
    {
        if (!$request->has("ticket")) {
            return $this->responseError(400, "Ticket Not Found");
        }
        $ticket = $request->get("ticket");
        $noteType = TicketNoteType::getType(TicketNoteType::AGENT_NOTE);
        $note = $this->repository->create([
            'ticket_id' => $ticket["id"],
            'note_type' => $noteType->id,
            'current_level' => $ticket["current_level"],
            'current_level_id' => $ticket["current_level_id"],
            'note' => $request->has('agent_note') ? $request->get('agent_note') : $noteType->label,
            'ticket_data' => json_encode([
                'ticket' => $ticket,
                'changes' => []
            ])
        ]);
        return $this->responseSuccess($note);
    }
}
