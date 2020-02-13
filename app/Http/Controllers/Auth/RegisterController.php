<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
;
use App\User_information;

use Illuminate\Support\Facades\Auth;

use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
    
        $user= User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'phone_number' => $data['phone_number'],
            'email' => $data['email'],
          
            'password' => Hash::make($data['password'])

        ]);
        // $user->save();

        $user->syncRoles(explode(',',$data['roles']));
     
    
  
    if( $data['roles'] == 3|| $data['roles'] ==4|| $data['roles'] ==5) {
    // dd(role_value);
        $user_informations=$user->User_information()->create([
            'user_id' => $user->id,
            'phone_number2' => $data['phone_number2'],
            'facebook' => $data['facebook'],
     
            'description' => $data['description'],
           
           
        ]);
        $image_path= request()->file('image')->store('media', 'public');
        $media = $user->media()->create([
            'media' => $image_path,
        ]); 
    }
            return $user;
    }








    
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);
        if(Auth::user()->hasRole('hall')){
            return redirect('/user');
       
      
            }
        else if(Auth::user()->hasRole('company')){
            return redirect('/user');
        
        
            }
        else if(Auth::user()->hasRole('coordination')){
            return redirect('/user');
        
        
            }
          
    }
}
