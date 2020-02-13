<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Type;
use \App\Service;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Database\Eloquent\Builder;
use DB;


class ServicesController extends Controller
{
    public function index(){
        $user = Auth::user();

        $serviceType = type::all()->sortBy('type');
        $services = Service::where('user_id', $user->id)->orderBy('created_at','DESC')->get();

        return view ('dashboard.services')->with('serviceType', $serviceType)->with('services', $services);
    }

    public function store(Request $request){
        $user = Auth::user();
        
        $service = new Service;
        if (request()->img){
            $img_path = request()->file('img')->store('media', 'public');
            $service->img = $img_path;
        }

        $service->name = request()->name;
        $service->price = request()->price;
        $service->img_title = request()->imgTitle;
        $service->description = request()->des;
        $service->user_id = $user->id;
        $service->type_id = request()->type;

        $service->save();
        return redirect('/services')->with('success', 'تم اضافة الخدمة بنجاح');
    }


    public function edit($id, Request $request){
        
        $service = Service::find($id);

        if (request()->img){
            $img_path = request()->file('img')->store('media', 'public');
            $service->img = $img_path;
        }

        $service->name = request()->name;
        $service->price = request()->price;
        $service->img_title = request()->img_title;
        $service->description = request()->description;
        $service->type_id = request()->type;
        
        $service->save();
        return redirect('/services')->with('success', 'تم تعديل الخدمة بنجاح');
    }

    public function delete($id){
        $service = Service::find($id);
        $service->delete();
        return back()->with('success', 'تم حذف هذه الخدمة');
    }
}
