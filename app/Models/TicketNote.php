<?php

namespace App\Models;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class TicketNote extends Model
{
    protected $guarded = []; // YOLO
    protected $fillable = ['ticket_id', 'note_type', 'note', 'ticket_data', 'current_level', 'current_level_id'];
    protected $table = 'ticket_note';

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            $post->{$post->getKeyName()} = (string) Str::uuid();
        });
    }

    public function getIncrementing()
    {
        return false;
    }

    public function getKeyType()
    {
        return 'string';
    }

    public function noteType() {
        return $this->hasOne(TicketNoteType::class, 'id', 'note_type');
    }
}
