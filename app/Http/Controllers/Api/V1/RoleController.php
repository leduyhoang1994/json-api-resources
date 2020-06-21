<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\UserRole;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function getAll() {
    	return $this->responseSuccess(UserRole::all());
    }
}
