<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use App\User;
use Illuminate\Http\Request;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */



    public function login(Request $request){
      

        if(Auth::attempt([
           
            'email' => $request-> email,
            'password' => $request-> password,
            
    
        ]))
    
         {
     
          $user=User::where('email',$request-> email)->first();
        //   if (!Auth::check()) {
         
        //     return  redirect()->back();
        // }          

         if(Auth::user()->hasRole('superadministrator')){
            return redirect('/home');
         
     
    
          }
          else if(Auth::user()->hasRole('administrator')){
            return redirect('/home');
        
        
            }
            else if(Auth::user()->hasRole('hall')){
                return redirect('/user');
           
          
                }
            else if(Auth::user()->hasRole('company')){
                return redirect('/user');
            
            
                }
            else if(Auth::user()->hasRole('coordination')){
                return redirect('/user');
            
            
                }
            else if(Auth::user()->hasRole('customer')){
                return redirect('/home');
            
            
                }
        
           
        
        
         }
    
  
      
        
     }
         
   
        



    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
