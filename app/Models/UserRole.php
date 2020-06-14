<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    const ADMINISTRATOR = 1;
    const SUPERVISOR = 2;
    const AGENT = 3;
    
    protected $table = "user_roles";
}
