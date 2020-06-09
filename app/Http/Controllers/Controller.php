<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Response;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function responseSuccess( $data = null ){
        return Response::json([
            "success" => true,
            "result"  => $data
        ] );
    }

    public function responseError( $errorCode, $msg=null ){
        return Response::json([
            "success"       => false,
            "error_code"    => $errorCode,
            "message"       => $msg
        ]);
    }
}
