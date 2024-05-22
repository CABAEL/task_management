<?php

namespace App\Http\Controllers;

use App\Models\Base;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    
    public function authenticate(Request $request)
    {

        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
        
        if (Auth::attempt(['username' => $credentials['username'],
         'password' => $credentials['password'],
         'deleted_at' => null,'status' => 1])){

            session()->regenerate();

            $role_id = Auth::user()->role_id;
            $rdr ='';

            if($role_id === 1){
                $rdr = 'admin/';
            }else if($role_id === 2){
                $rdr = 'user/';
            }

            $data = [
                'rdr' => $rdr
            ];

            return $this->responseBuilder(1,"Login success",'',$data);

        }else{

            return $this->responseBuilder(0,"Login Error",['Invalid Credentials'],[]);

        }
  
        
    }

    public function signup(Request $request)
    {

        $request->validate([
            'firstname' => 'required|string|max:60',
            'middle' => 'nullable|string|max:60',
            'lastname' => 'required|string|max:60',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $create = User::create([
            'fname' => $request->firstname,
            'mname' => $request->middle,
            'lname' => $request->lastname,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role_id' => 2
        ]);

        $data = [
            'rdr' => '/'
        ];

        if($create){
            return $this->responseBuilder(1,"Submit success!",'',$data);
        }else{
            return $this->responseBuilder(0,"Signup Error",['Unknown Error'],[]);
        }
        
    }


}
