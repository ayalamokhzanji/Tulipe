<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservation;
// use \App\Customer;
use \App\User;
use DB;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        //$Reservation = Reservation::where('user_id', $user->id)->get();

        //        $customer = DB::table('customers')->where('id', $Reservation->customer_id->get();

        // $customer = App\Customer::whereHas('comments', function (Builder $query) {
        //     $query->where('content', 'like', 'foo%');
        // })->get();
        
        // dd($customer);
        //$Reservation=Reservation::all();
        
    //    $Customer = DB::table('Customers')->where('id', $Reservation->customer_id)->get();

        return view('dashboard.table')->with('user',$user);
  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('viewcompany.show');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id, Request $request)
    {
        $user = User::where('id', $id)->first();

        $Reservation=new Reservation;
        // $Reservation->customer_id=Auth::guard('customer')->id();
        // $Reservation->customer_name=Auth::guard('customer')->user()->name;
        // $Reservation->customer_last_name=Auth::guard('customer')->user()->last_name;
        // $Reservation->customer_Phone_number=Auth::guard('customer')->user()->Phone_number;
        // $Reservation->customer_email=Auth::guard('customer')->user()->email;
        


        // $Reservation = Reservation::create([
        //     'user_id' => $user->id // or whatever you get the ID, maybe through a URL parameter.
        // ]);
        //dd($user);
        $Reservation->user_id= $user->id;
        $Reservation->date=$request->input('date');
        $Reservation->period=$request->input('period');
        $Reservation->amount=$request->input('amount');
      
       $Reservation->save();
       
        return redirect('viewcompany');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
