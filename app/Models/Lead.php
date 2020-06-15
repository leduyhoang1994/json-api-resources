<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Lead.
 *
 * @package namespace App\Models;
 */
class Lead extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];
    protected $guarded = [];

    public function ticket()
    {
        return $this->hasOne(Ticket::class, 'id', 'current_ticket_id')->select(["*", "attr.*"]);
    }

    public function agent()
    {
        return $this->hasOne(User::class, 'id', 'current_agent_id')->select(["id", "email"]);
    }
}
