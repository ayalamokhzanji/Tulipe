<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;

class LoginCheck extends Controller
{
//company check
    function checkEmailCompany(Request $request)
    {
        if($request->get('email'))
        {
            $email = $request->get('email');
            $data = DB::table("users")
            ->where('email', $email)
            ->count();
            if($data > 0)
            {
                echo 'found';
            }
            else
            {
                echo 'notFound';
            }
        }
    }

    function checkPasswordCompany(Request $request)
    {
        if($request->get('password') && $request->get('email'))
        {
            $password = $request->get('password');
            $email = $request->get('email');
            $user = DB::table("users")
            ->where('email', $email)->first();
            if(Hash::check($password, $user->password))
            {
                echo 'found';
            }
            else{
                echo 'notFound';
            }
        }
    }

//Admin check

    function checkEmailAdmin(Request $request){
        if($request->get('email'))
        {
            $email = $request->get('email');
            $data = DB::table("admins")
            ->where('email', $email)
            ->count();
            if($data > 0)
            {
                echo 'found';
            }
            else
            {
                echo 'notFound';
            }
        }
    }

    function checkPasswordAdmin(Request $request)
    {
        if($request->get('password') && $request->get('email'))
        {
            $password = $request->get('password');
            $email = $request->get('email');
            $user = DB::table("admins")
            ->where('email', $email)->first();
            if(Hash::check($password, $user->password))
            {
                echo 'found';
            }
            else{
                echo 'notFound';
            }
        }
    }


//customer check

    function checkEmailCustomer(Request $request){
        if($request->get('email'))
        {
            $email = $request->get('email');
            $data = DB::table("customers")
            ->where('email', $email)
            ->count();
            if($data > 0)
            {
                echo 'found';
            }
            else
            {
                echo 'notFound';
            }
        }
    }

    function checkPasswordCustomer(Request $request)
    {
        if($request->get('password') && $request->get('email'))
        {
            $password = $request->get('password');
            $email = $request->get('email');
            $user = DB::table("customers")
            ->where('email', $email)->first();
            if(Hash::check($password, $user->password))
            {
                echo 'found';
            }
            else{
                echo 'notFound';
            }
        }
    }

    
}
