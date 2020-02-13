<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Service;
use \App\User;
use \App\Reservation;
use \App\Customer;
use Illuminate\Support\Facades\Auth;


class CompanyCartController extends Controller
{

    public function index($id){
        
        $user = User::where('id', $id)->first();
        $services = Service::where('user_id', $id)->paginate(6);
        $serviceTypes = Service::all()->where('user_id', $user->id)->unique('type_id')->sortBy('type_id');

        return view('viewcompany.companyCart')->with('services', $services)->with('user', $user)->with('serviceTypes', $serviceTypes);

    }

    public function store(Request $request, $id){
        
        $user = User::find($id);
        $customer = Auth::guard('customer')->id();

        $checkbox = $request->input('cb');

        $quantity = $request->input('quantity');
        $filterQuantity = array_filter($quantity);
        $indexedFilterQuantity = array_values($filterQuantity);

        $date = $request->input('date');
        $filterDate = array_filter($date);
        $indexedFilterDate = array_values($filterDate);

        $period = $request->period;
        $filterPeriod = array_filter($period);
        $indexedFilterPeriod = array_values($filterPeriod);
        
        
        if(count($checkbox) > 0){
            foreach($checkbox as $key => $s )
            {
                $user->customers()->attach($customer, [ 
                    'user_id' => $id, 
                    'date' => $indexedFilterDate[$key],
                    'period' => $indexedFilterPeriod[$key],
                    'service_id' => $checkbox[$key], 
                    'quantity' => $indexedFilterQuantity[$key],
                ]);
            }	
            return back()->with('success', 'تمت عملية الحجز بنجاح');
        }
        else {
            
            return back()->with('info', 'الرجاء اختيار الخدمة التي ترغب في حجزها');
        }
    }

    public function viewCart(){

        $customerID =  Auth::guard('customer')->id();
        $customer = Customer::find($customerID);

        return view('cart')->with('customer', $customer);

    }
}
