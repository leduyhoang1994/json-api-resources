<?php

namespace App\Models;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class TicketNote extends Model
{
    protected $guarded = []; // YOLO
    protected $fillable = ['ticket_id', 'note_type', 'note', 'mongo_ticket_data_id', 'current_level', 'current_level_id'];
    protected $table = 'ticket_note';

    public function noteType() {
        return $this->hasOne(TicketNoteType::class, 'id', 'note_type');
    }
}
