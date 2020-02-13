<?php

namespace App\Http\Controllers;
use \App\User;
use Illuminate\Http\Request;

class UserDetails extends Controller
{
    public function index()
    { 
         $Users=User::all();
        $Users =User::orderBy('created_at','desc')->paginate(2);
        
        return view('AdminDashboard.UserDetails')->with('Users',$Users);
        
      }




      public function destroy($id)
      {
          $Users =User::find($id);
          $Users->delete();
          return redirect()->back()->with('success', ' تم الحدف !');
      }
}
