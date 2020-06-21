<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TicketNoteType extends Model
{
    protected $table = 'ticket_note_type';

    const UPDATE_TICKET = "update_ticket";
    const UPDATE_LEVEL = "update_level";
    const AGENT_NOTE = "agent_note";
    const OPEN_TICKET = "open_ticket";
    const CLOSE_TICKET = "close_ticket";

    public static function getType($code) {
        return self::where("code", $code)->first();
    }
}
