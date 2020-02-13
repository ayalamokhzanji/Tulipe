<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Message;
use \App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use DB;


class contactController extends Controller
{
    public function index(){
        return view('contactUs');
    }

    //user contact us (view company)
    public function store($id, Request $request){
        
        $user = User::where('id', $id)->first();

        $message = new Message();

        $message->email = request()->email;
        $message->message = request()->message;
        $message->user_id = $user->id;

        $message->save();

        return back();
    }

    //main contact us
    public function save( Request $request){
        
        $message = new Message();

        $message->email = request()->email;
        $message->message = request()->message;
        $message->user_id = 0;

        $message->save();

        return back();
    }


    public function userView(){
        if(Auth::user()->hasRole('hall')){
            $user = Auth::user();
      
             $messages = Message::where('user_id', $user->id)->orderBy('created_at','DESC')->paginate(3);

             return view('dashboard.messages')->with('messages', $messages);}

        if(Auth::user()->hasRole('superadministrator')){
            $user = Auth::user();


            $messages = Message::where('user_id', 0)->orderBy('created_at','desc')->paginate(3);

            return view('AdminDashboard.adminmessage')->with('messages', $messages);}

 

    }

    public function destroy($id){
        $messgae = Message::find($id);
        $messgae->delete();
        return back();
    }

    public function viewDetail(Request $request){

        if($request->get('id'))
        {
            $id = $request->get('id');
            
            $message = DB::table("messages")
            ->where('id', $id)
            ->first();
            $output = '<div>' . $message->email . '</div>';
            $output .= '<div>' . $message->created_at . '</div><hr>';
            $output .= '<div>' . $message->message . '</div>';
            echo $output;


        }


    }

    
}
