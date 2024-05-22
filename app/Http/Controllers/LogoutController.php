<?php

namespace App\Http\Controllers;

use App\Models\Base;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function logout_user(Request $request){
        
        

        if($role = Auth::user()->role_id){

            $message = '['.strtoupper($role)."] : [".Auth::user()->username."] : [".Auth::user()->id."] has logged out.";

            Auth::logout();
    
            $request->session()->invalidate();
        
            $request->session()->regenerateToken();
        
            return redirect('/login');

        }else{

            return redirect('/login');

        }

    }
}
