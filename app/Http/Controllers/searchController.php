<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use \App\User;
use \App\Location;
use \App\Reservation;
use App\post;
use Illuminate\Database\Eloquent\Builder;

class searchController extends Controller
{

    public function searchBox(){

        $user = user::all()->where('role','قاعات')->sortBy('name');
        $price = user::all()->where('role','قاعات')->unique('price')->sortBy('price');
        $capacity = user::all()->where('role','قاعات')->unique('capacity')->sortBy('capacity');
        // $location = location::whereHas('users', function (Builder $query) 
        //     {
        //         $query->where('role','قاعات');

        //     })->orderBy('location', 'asc')->get();


        $userF = user::all()->where('role','شركة اكل')->sortBy('name');
        // $locationF = location::whereHas('users', function (Builder $query) 
        // {
        //     $query->where('role','شركة اكل');

        // })->orderBy('location', 'asc')->get();


        $userD = user::all()->where('role','شركة تنسيق')->sortBy('name');
        // $locationD = location::whereHas('users', function (Builder $query) 
        // {
        //     $query->where('role','شركة تنسيق');



        // })->orderBy('location', 'asc')->get();

        $userall=user::all();
        // $userLocation = DB::table('locations')->where('id', $userall->location_id)->first();->with('userLocation',$userLocation)

        $Posts=Post::all()->where('user_id','0');
        
        return view('welcome')->with('Posts',$Posts)->with('users',$user)->with('prices',$price)->with('capacities',$capacity)
        ->with('usersF', $userF)->with('usersD', $userD)->with('userall', $userall);
    //    ->with('locationsD', $locationD)->with('locationsF', $locationF)->with('locations',$location)
    }

    public function search(Request $request){
        
        $query1 =  DB::table('reservations')->where('role', 'قاعات')->where('date', request()->checkIn)->get('user_id');

        $results = User::query();

        if(request()->selectName){
            $results->where('name', request()->selectName)->where('role', 'قاعات');
        }
        // if(request()->selectLocation){
        //     $results->where('location_id', request()->selectLocation)->where('role', 'قاعات');
        // }
        if(request()->selectPrice){
            $results->where('price', request()->selectPrice)->where('role', 'قاعات');
        }
        if(request()->selectCapacity){
            $results->where('capacity', request()->selectCapacity)->where('role', 'قاعات');
        }
        if(request()->checkIn){
            if(count($query1) == 0){
                $results->where('role', 'قاعات');
            }
            else{
                foreach ($query1 as $row){
                    foreach ($row as $row1){
                        
                        $results->where('id', '<>', $row1)->where('role', 'قاعات');
                        
                    }
                }
            }
        }
        return view('searchResult')->with('data', $results->get());

        
    }

    public function searchFood(Request $request){

        $query1 =  DB::table('reservations')->where('role', 'شركة اكل')->where('date', request()->checkIn2)->get('user_id');

        $results = User::query();

        if(request()->selectName2){
            $results->where('name', request()->selectName2)->where('role', 'شركة اكل');
        }
        // if(request()->selectLocation2){
        //     $results->where('location_id', request()->selectLocation2)->where('role', 'شركة اكل');
        // }
        if(request()->checkIn2){
            if(count($query1) == 0){
                $results->where('role', 'شركة اكل');
            }
            else{
                foreach ($query1 as $row){
                    foreach ($row as $row1){
                        
                        $results->where('id', '<>', $row1)->where('role', 'شركة اكل');
                        
                    }
                }
            }
        }
        return view('searchResult')->with('data', $results->get());

    }
    
    public function searchDesign(Request $request){


        $results = User::query();

        if(request()->selectName3){
            $results->where('name', request()->selectName3)->where('role', 'شركة تنسيق');
        }
        // if(request()->selectLocation3){
        //     $results->where('location_id', request()->selectLocation3)->where('role', 'شركة تنسيق');
        // }

        return view('searchResult')->with('data', $results->get());
        
    }


            
}
