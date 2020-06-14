<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class TicketNoteMongo extends Model
{
  protected $guarded = ["_id"];
  protected $connection = 'mongodb';
  protected $collection = 'ticket_note_data';
}
