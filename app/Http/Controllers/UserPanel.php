<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;
use \App\Location;
use \App\Media;
use DB;
use \App\User_information;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

class UserPanel extends Controller
{
    
    public function getUserInfo(){
        $user = Auth::user();
       
        //bring the user images
        $imgs = Media::with('user')->where('user_id', $user->id)->where('media', 'LIKE', '%jpeg')->orwhere('media', 'LIKE', '%png')->orwhere('media', 'LIKE', '%jpg')->get();
        $pp = Media::with('user')->where('user_id', $user->id)->where('media', 'LIKE', '%jpeg')->orwhere('media', 'LIKE', '%png')->orwhere('media', 'LIKE', '%jpg')->first();
        $videos = Media::with('user')->where('user_id', $user->id)->where('media', 'LIKE', '%mp4')->get();
        $user_information=DB::table('user_informations')->where('user_id', $user->id)->first();

        $locations = location::all()->unique('location')->sortBy('location');

        $userLocation = DB::table('locations')->where('id', $user_information->location_id)->first();
      
        //dd($user_information);

        return view('dashboard.user')->with('user', $user)->with('user_information', $user_information)->with('imgs', $imgs)->with('pp', $pp)->with('videos', $videos)->with('locations', $locations)->with('userLocation', $userLocation);
    }

    public function updateUser(){

        $user = Auth::user();
    
        $user->email = request()->email;
        $user->phone_number = request()->phone_number;


        if (request()->media){
            $media_path = request()->file('media')->store('media', 'public');
            $media = $user->media()->create([
                'media' => $media_path,
                'title' => request()->title,
            ]); 
        }
        
        $user_information=DB::table('user_informations')->where('user_id', $user->id)->update([
          
            'phone_number2' =>request()->phone_number2,
            'facebook' =>request()->facebook,
            'price' =>request()->price,
            'capacity' =>request()->capacity,
            'description' =>request()->description,
            'location_id' =>request()->location,
   
           
           
           
        ]); 
        
        
            $location = DB::table('locations')->where('id',  $user->User_information->location_id)->update([
           
                'latitude' =>request()->lat,
                'longitude' =>request()->lng,
             
            ]); 
        
            
        /*if($video = request()->file('video')){
            $name = $video->getClientOriginalName();
            if($video->move('videos', $name)){
                $media = $user->media()->create([
                    'video' => $video_path,
                    'role' => $user->role,
                ]);
            }

        }*/

  
        
   
        
        $user->save();
      
        return redirect('/user');

    }

    public function destroyMedia($id){
        $media = media::find($id);
        $media->delete();
        return redirect('/user');
    }

    public function updateMediaTitle($id){
        $media = media::find($id);
        $media->title = request()->title2;

        $media->save();

        return redirect('/user');
    }

}
