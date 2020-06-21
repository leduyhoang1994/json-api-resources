<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class AgentGroup.
 *
 * @package namespace App\Models;
 */
class AgentGroup extends Model implements Transformable
{
	use TransformableTrait, SoftDeletes;

	const STATUS_ACTIVE = 1;
	const STATUS_INACTIVE = 0;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'leader_id'];

	public function agents()
	{
    	return $this->belongsToMany(User::class, UserAgentGroup::class)->withTimestamps();
	}

	public function leader()
	{
		return $this->hasOne(User::class, 'id', 'leader_id');
	}
}
