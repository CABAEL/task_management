<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;


    public function responseBuilder($status = null,$message = null,$error = null,$data = null){

        $data_arr = array(
            'status' => $status,
            'message' => $message,
            'data' => $data,
            'errors' => $error
        );
    
        return response()->json($data_arr);
         
    }

}
