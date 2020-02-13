<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/test', function () {
    return view('test');
});




//setting data in the search box
Route::get('/', 'searchController@searchBox');
//search holl 
Route::post('search', 'searchController@search');
//search food company
Route::post('searchFood', 'searchController@searchFood');
//search design company
Route::post('searchDesign', 'searchController@searchDesign');
//contact us
Route::get('contactus', 'contactController@index');
Route::post('customer/contactus', 'contactController@save');
//contact company
Route::post('contact/{id}', 'contactController@store');




//email uniqe validation for user
Route::post('/email_available/check', 'AvailableCheck@checkEmail')->name('email_available.check');
//name uniqe validation for user
Route::post('/name_available/check', 'AvailableCheck@checkName')->name('name_available.check');
//email uniqe validation for customer
Route::post('/email_cust_available/check', 'AvailableCheck@checkEmailCust')->name('email_cust_available.check');

//company login
//company login email check
Route::post('/company_email_login/check', 'LoginCheck@checkEmailCompany')->name('email_true.check');
//company login password check
Route::post('/company_password_login/check', 'LoginCheck@checkPasswordCompany')->name('password_company.check');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::prefix('/')->middleware('role:hall|company|coordination')->group(function() {

    //get user info
    Route::get('/user','UserPanel@getUserInfo');
    //update user data
    Route::patch('/user/edit', 'UserPanel@updateUser');
    //delete media
    Route::delete('user/media/{id}', 'UserPanel@destroyMedia');
    //update media title
    Route::patch('user/meida/title/{id}', 'UserPanel@updateMediaTitle');
    // Route::resource('dashboard','UserPanel');
   // Route::get('/addmeal','UserPanel@index');

   Route::patch('/addmeal' ,'UserPanel@store');
   Route::get('/table' ,'ReservationController@index');
   Route::DELETE('table/{id}' ,'ReservationController@destroy');
   //Route::get('/Post' ,'PostController@index');
   Route::DELETE('Post/{id}' ,'PostController@destroy');
   

   Route::resource('/Post' ,'PostController');

   Route::PUT('/Post/{id}' ,'PostController@update');

    //user view messages
    Route::get('/messages', 'contactController@userView');
    //user delete message
    Route::delete('user/message/{id}', 'contactController@destroy');
    //ajax for user view more message
    Route::post('user/message/detail', 'contactController@viewDetail')->name('messageDetails');

   //services
   //show services
   Route::get('/services','ServicesController@index');
   //add new service
   Route::post('/user/add/service', 'ServicesController@store');
   //delete a service
   Route::delete('user/service/{id}', 'ServicesController@delete');
   //edit service
   Route::PUT('user/edit/service/{id}', 'ServicesController@edit');
 
});








Route::prefix('/')->middleware('role:superadministrator|administrator')->group(function() {

    Route::resource('PostAdmin' ,'PostController');


   Route::get('UserDetails' ,'UserDetails@index');
   Route::DELETE('UserDetails/{id}' ,'UserDetails@destroy');

    //user view messages
    Route::get('adminmessage', 'contactController@userView');
    //user delete message
    Route::delete('adminmessage/{id}', 'contactController@destroy');
    //ajax for user view more message
    Route::post('adminmessage/detail', 'contactController@viewDetail')->name('messageDetails');


    Route::post('user/message/detail', 'PostController@viewDetail')->name('PostDetails');

});






Route::prefix('/')->middleware('role:customer')->group(function() {

    //view services table for reservation (customer only!)
Route::get('reservation/{id}', 'CompanyCartController@index');
//storing customer reservation
Route::post('customer/reservation/{id}', 'CompanyCartController@store');
//customer viewing his cart
Route::get('/customerCart', 'CompanyCartController@viewCart');

});
Route::get('contactus', 'contactController@index');
Route::post('customer/contactus', 'contactController@save');
//contact company
Route::post('contact/{id}', 'contactController@store');








Route::post('/viewcompany/{id}','ReservationController@store'); 
Route::post('/dashboard/Post/{id}','PostController@store');


Route::resource('viewcompany' ,'viewcompanyController');

Route::resource('viewHall' ,'viewHall');
