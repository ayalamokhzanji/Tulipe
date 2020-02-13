@extends('dashboard.layout')
@section('content')

<style>
    .center-text{
        text-align: center !important;
    }
</style>
<!-- End Navbar -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card strpied-tabled-with-hover">
                    <div class="card-header ">
                        <h4 class="card-title">Striped Table with Hover</h4>
                        <p class="card-category">Here is a subtitle for this table</p>
                    </div>
                    <div class="card-body table-full-width table-responsive">
                        <table class="table table-striped table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th style="text-align: center !important">اسم الخدمة</th>
                                    <th style="text-align: center !important">عدد القطع</th>
                                    <th style="text-align: center !important">تاريخ الحجز</th>
                                    <th style="text-align: center !important">الفترة</th>
                                    <th style="text-align: center !important">المدفوع</th>
                                    <th style="text-align: center !important">اسم الزبون</th>
                                    <th style="text-align: center !important">رقم الهاتف</th>
                                    <th style="text-align: center !important">البريد الالكتروني</th>
                                    <th style="text-align: center !important"></th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($user->customers as $customer) 
                                <tr>
                                    <td>{{$customer->pivot->service->name}}</td>
                                    <td>{{$customer->pivot->quantity}}</td>
                                    <td>{{$customer->pivot->date}}</td>
                                    <td>{{$customer->pivot->period}}</td>
                                    <td>{{$customer->pivot->amount}}</td>

                                    <td>{{$customer->name}} {{$customer->last_name}}</td>
                                    <td>{{$customer->Phone_number}}</td>
                                    <td>{{$customer->email}}</td>
                                    
                                    <th scope="row"> 
                                        <form  method="POST" action="/table/id" enctype="multipart/form-data">
                                        {{method_field('DELETE')}}
                                        {{csrf_field()}}

                                            <button type="submit"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                        
                                        </form> 
                                    </th>   
                                </tr>

                            @endforeach
                            </tbody>
                        </table>
                        <button class="btn btn-primary pr-5 pl-5" type="submit" form="reservation-form">حجز 
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

 @endsection