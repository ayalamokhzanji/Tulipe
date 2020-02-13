<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

       
        <link href="css/nav.css" rel="stylesheet" media="all">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css?family=Aref+Ruqaa:400,700&display=swap&subset=arabic" rel="stylesheet"> 
    </head>
   
    <body>
 
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
   <a class="navbar-brand" href="#"> توليب </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav m-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/">الرئيسية <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="/contactus" >تواصل معنا</a>
      </li>


  
 
 
            @if (Route::has('login'))
          
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                    <li class="nav-item">
                       <a href=""  class="nav-link " data-toggle="modal" data-target="#modalLoginForm">
                      تسجيل الدخول</a>
                      </li>



                        @if (Route::has('register'))
                        <li class="nav-item">

                      <a href="" class="nav-link " data-toggle="modal" data-target="#myModal2">
                      انشاء حساب</a>
                      </li>
                        @endif
                    @endauth
                
            @endif 
            </ul>
    <!-- <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form> -->
  </div>
</nav>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
   



<div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">تسجيل دخول</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <form method="POST" action="{{ route('login') }}" class="login-form">
                  @csrf
        <div class="modal-body mx-3">
          <div class="md-form mb-4">
            <i class="fas fa-envelope prefix"></i>
              <label  class="col-md-12 col-form-label text-md-right">البريد الاكتروني</label>
                <input id="companyEmailLogin" id="ex3" type="email" class="form-control w-100 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    <span id="error_CompanyLoginEmail"></span>

                    @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong> الرجاء التحقق من المدخلات</strong>
                            </span>
                    @enderror
          </div>
            <div class="md-form mb-4">
              <i class="fas fa-lock prefix"></i>
                 <label  class="col-md-12 col-form-label text-md-right">>كلمة المرور</label>
                   <input id="companyPasswordLogin" type="password" class="form-control w-100 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    <span id="error_CompanyLoginPassword"></span>

                      @error('password')
                              <span class="invalid-feedback" role="alert">
                                  <strong>الرجاء التحقق من الدخلات  </strong>
                              </span>
                      @enderror
            </div>
        </div>
        <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-default">Login</button>
      </div>
      </form>
                <!--Footer-->
        <div class="modal-footer">
            <button type="button" class="btn btn-outline-info waves-effect mx-auto btn-close" data-dismiss="modal">اغلاق</button>
        </div>
  
      </div>
    </div>
  </div>
</div>


 

<!-- انشاء حساب  -->

  <!-- The Modal -->
  <div class="modal fade" id="myModal2">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
            
            
            <div class="login-html">
            <ul class="nav nav-tabs md-tabs tabs-2 light-blue darken-3" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" data-toggle="tab" href="#panel1" role="tab"><i class="fas fa-user mr-1"></i>
                انشاء حساب مؤسسة</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#panel2" role="tab"><i class="fas fa-user-plus mr-1"></i>
                انشاءحساب زيون</a>
            </li>
          </ul>
  
          <!-- Tab panels -->
          <div class="tab-content">
            <!--Panel 7-->
            <div class="tab-pane fade in show active" id="panel1" role="tabpanel">
  
              <!--Body-->
              <div class="modal-body">
              
              <form class="text-center " method="POST" action="{{ route('register') }}" enctype="multipart/form-data" >
                                    @csrf
                                    <div class="form-row mb-4">
                                    <div class="col">
                                            <label for="first_name" class="co col-form-label text-md-right">{{ __('first_name') }}</label>
                                            <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="name" autofocus>

                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                    <div class="col">
                                            <label for="last_name" class="col col-form-label text-md-right">{{ __('last_name') }}</label>

                                        
                                            <input id="first_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="name" autofocus>

                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                    <div class="col">
                                        <label for="image" class="col col-form-label text-md-right">  صورة للمؤسسة</label>
                                        <input id="image" type="file" class="form-control" name="image" autocomplete="image"accept=".jpeg, .jpg, .png" required value="83179881_2530549400549442_583357176995643392_n">
                                        
                                        </div>
                                        <div class="col">
                                        <p >نوع الخدمة</p>
                                            <input   type="radio" name="roles" value="3" checked> قاعة
                                            <input  type="radio" name="roles" value= "4"> شركة اكل
                                            <input  type="radio" name="roles" value="5"> شركة تنسيق
                                        </div>
                                    </div>

                                    <div class="form-row mb-4">
                                    
                                    <div class="col">

                                        <label for="phone2" class="col col-form-label text-md-right" >  رقم الهاتف الثاني</label>
                                        <input id="phone_number2" type="number" class="form-control" value="12" name="phone_number2" autocomplete="phone_number2" placeholder="09Xxxxxxxx">
                                        </div>
                                        <div class="col">
                                        <label for="social" class="col col-form-label text-md-right" >  اسم صفحة التواصل(فيسبوك)</label>

                                        <input id="facebook" type="url" class="form-control" name="facebook" autocomplete="facebook" pattern="">
                                                
                                        </div>
                                        <div class="col">
                                        <label for="phone_number" class="col col-form-label text-md-right">{{ __('phone_number') }}</label>

                                        <input id="phone_number"value="12" type="number" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" required autocomplete="name" autofocus>

                                    </div>
                                    </div>
                                    <div class="form-row mb-4">
                                    <div class="col">
                                        <label for="email" class="col col-form-label text-md-right">البريد الاكتروني </label>

                                        
                                            <input id="emailReg" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="example@gmail.com">
                                            <span id="error_email" class="ml-5"></span>

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col">
                                        <label for="password" class="col col-form-label text-md-right">{{ __('Password') }}</label>
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>

                                                                            
                                        <div class="col">
                                        <label for="password-confirm" class="col col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                        
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                       
                                    
                                </div>
                                <div class="form-row mb-4">
                                <div class="col">
                                        <label for="description" class="col-md-12 col-form-label text-md-right"> وصف تسويقي </label>
                                        <textarea required class="form-control" name="description" id="description" cols="5" rows="3"></textarea>
                                        </div>
                                        <div class="col"> 
                                        <div class="options text-right">
                    <p class="pt-1">Already have an account? <a href="#" class="blue-text">Log In</a></p>
                    </div>
                    <div class="col"> 
                    <button id="register" class="btn-submit m-t-35" type="submit">تسجيل</button>
                    <button type="button" class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Close</button>
                </div>
            </div>

                                    


        </form>
    </div>
    </div>
    </div>
        
  

            <!--/.Panel 7-->
  
            <!--Panel 8-->
            <div class="tab-pane fade" id="panel2" role="tabpanel">
  
              <!--Body-->
              <div class="modal-body">
               
  
  
   
  <!-- Default form register -->
  <form class="text-center " method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
  
              @csrf
  
      <div class="form-row mb-4">
          <div class="col">
              <!-- First name -->
              <input id="first_name" type="text"  placeholder="الاسم  الاول"class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ old('first_name') }}" required autofocus>
  
                  @if ($errors->has('first_name'))
                  <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('first_name') }}</strong>
                  </span>
                  @endif
           </div>
          
          
          <div class="col">
              <!-- Last name -->
              <input id="name" type="text"  placeholder="الاسم  الثاني"class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name') }}" required autofocus>
  
                  @if ($errors->has('last_name'))
                  <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('last_name') }}</strong>
                  </span>
                  @endif
         </div>
      </div>
  
      <!-- E-mail -->
      <input id="emailRegCust"placeholder="  البريد الالكتروني" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
          <span id="error_emailRegCust" style="margin-left: 230px;"></span>
  
         
               @if ($errors->has('email'))
                  <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('email') }}</strong>
                  </span>
                @endif
  
  
      <!-- Password -->
      <div class="form-row mb-4">
          <div class="col">
           <input  placeholder=" كلمة المرور"id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required pattern=".{8,}" title="اكثر من 8 عناصر ">
  
               @if ($errors->has('password'))
                  <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('password') }}</strong>
                  </span>
             @endif
             </div >
             <div class="col">
            
             <input placeholder="تأكيد كلمة المرور"id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
             </div >
             </div >
             <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
          At least 8 characters and 1 digit
      </small>
  
      <!-- Phone number -->
    
    
      <input type="number" id="defaultRegisterFormPassword" class="form-control" placeholder="الرقم" name="phone_number" aria-describedby="defaultRegisterFormPasswordHelpBlock">
    
       <small id="defaultRegisterFormPhoneHelpBlock" class="form-text text-muted mb-4">
          Optional - for two step authentication
      </small>
      <input   type="radio" name="roles" value="6" checked> قاعة
      <!-- Newsletter -->
      <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" id="defaultRegisterFormNewsletter">
          <label class="custom-control-label" for="defaultRegisterFormNewsletter">Subscribe to our newsletter</label>
      </div>
  
      <!-- Sign up button -->
      <div class="modal-footer">
                            <div class="options text-right">
                            <p class="pt-1">Already have an account? <a href="#" class="blue-text">Log In</a></p>
                            </div>
                            <button id="register" class="btn-submit m-t-35" type="submit">تسجيل</button>
                            <button type="button" class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Close</button>
                        </div>
                        </div>                        
  
  
                </form>
            </div>
            <!--/.Panel 8-->
 
  
        </div>
      </div>
      <!--/.Content-->
    </div>
  </div>
 
            </div>
        </div>



 
      </div>
    </div>
  </div>
  
</div>

<!--  -->

@yield('content')  
<footer>
      <div class="footer" id="footer">
          <div class="container">
              <div class="row">
                  <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
                      <h3> Lorem Ipsum </h3>
                      <ul>
                          <li> <a href="#"> Lorem Ipsum </a> </li>
                          <li> <a href="#"> Lorem Ipsum </a> </li>
                          <li> <a href="#"> Lorem Ipsum </a> </li>
                          <li> <a href="#"> Lorem Ipsum </a> </li>
                      </ul>
                  </div>
                  <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
                      <h3> Lorem Ipsum </h3>
                      <ul>
                          <li> <a href="#"> Lorem Ipsum </a> </li>
                          <li> <a href="#"> Lorem Ipsum </a> </li>
                          <li> <a href="#"> Lorem Ipsum </a> </li>
                          <li> <a href="#"> Lorem Ipsum </a> </li>
                      </ul>
                  </div>
                  <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
                      <h3> Lorem Ipsum </h3>
                      <ul>
                          <li> <a href="#"> Lorem Ipsum </a> </li>
                          <li> <a href="#"> Lorem Ipsum </a> </li>
                          <li> <a href="#"> Lorem Ipsum </a> </li>
                          <li> <a href="#"> Lorem Ipsum </a> </li>
                      </ul>
                  </div>
                  <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
                      <h3> Lorem Ipsum </h3>
                      <ul>
                          <li> <a href="#"> Lorem Ipsum </a> </li>
                          <li> <a href="#"> Lorem Ipsum </a> </li>
                          <li> <a href="#"> Lorem Ipsum </a> </li>
                          <li> <a href="#"> Lorem Ipsum </a> </li>
                      </ul>
                  </div>
                  <div class="col-lg-3  col-md-3 col-sm-6 col-xs-12 ">
                      <h3> Lorem Ipsum </h3>
                     
                      <ul class="social">
                          <li> <a href="#"> <i class=" fa fa-facebook">   </i> </a> </li>
                          <li> <a href="#"> <i class="fa fa-twitter">   </i> </a> </li>
                          <li> <a href="#"> <i class="fa fa-google-plus">   </i> </a> </li>
                          <li> <a href="#"> <i class="fa fa-pinterest">   </i> </a> </li>
                          <li> <a href="#"> <i class="fa fa-youtube">   </i> </a> </li>
                      </ul>
                  </div>
              </div>
              <!--/.row--> 
          </div>
          <!--/.container--> 
      </div>
      <!--/.footer-->
      
      <div class="footer-bottom">
          <div class="container">
              <p class="pull-left"> Copyright © Footer E-commerce Plugin 2014. All right reserved. </p>
            
          </div>
      </div>
      <!--/.footer-bottom--> 
  </footer>
 
  
  <style>
  
  .full {
      width: 100%;	
  }
  .gap {
    height: 30px;
    width: 100%;
    clear: both;
    display: block;
  }
  .footer {
    background: #EDEFF1;
    height: auto;
    padding-bottom: 30px;
    position: static;
    width: 100%;
    border-bottom: 1px solid #CCCCCC;
    border-top: 1px solid #DDDDDD;
  }
  .footer p {
    margin: 0;
  }
  .footer img {
    max-width: 100%;
  }
  .footer h3 {
    border-bottom: 1px solid #BAC1C8;
    color: #54697E;
    font-size: 18px;
    font-weight: 600;
    line-height: 27px;
    padding: 40px 0 10px;
    text-transform: uppercase;
  }
  .footer ul {
    font-size: 13px;
    list-style-type: none;
    margin-left: 0;
    padding-left: 0;
    margin-top: 15px;
    color: #7F8C8D;
  }
  .footer ul li a {
    padding: 0 0 5px 0;
    display: block;
  }
  .footer a {
    color: #78828D
  }
  .supportLi h4 {
    font-size: 20px;
    font-weight: lighter;
    line-height: normal;
    margin-bottom: 0 !important;
    padding-bottom: 0;
  }
  .newsletter-box input#appendedInputButton {
    background: #FFFFFF;
    display: inline-block;
    float: left;
    height: 30px;
    clear: both;
    width: 100%;
  }
  .newsletter-box .btn {
    border: medium none;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    -o-border-radius: 3px;
    -ms-border-radius: 3px;
    border-radius: 3px;
    display: inline-block;
    height: 40px;
    padding: 0;
    width: 100%;
    color: #fff;
  }
  .newsletter-box {
    overflow: hidden;
  }
  .bg-gray {
    background-image: -moz-linear-gradient(center bottom, #BBBBBB 0%, #F0F0F0 100%);
    box-shadow: 0 1px 0 #B4B3B3;
  }
  .social li {
    background: none repeat scroll 0 0 #B5B5B5;
    border: 2px solid #B5B5B5;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    -o-border-radius: 50%;
    -ms-border-radius: 50%;
    border-radius: 50%;
    float: left;
    height: 36px;
    line-height: 36px;
    margin: 0 8px 0 0;
    padding: 0;
    text-align: center;
    width: 36px;
    transition: all 0.5s ease 0s;
    -moz-transition: all 0.5s ease 0s;
    -webkit-transition: all 0.5s ease 0s;
    -ms-transition: all 0.5s ease 0s;
    -o-transition: all 0.5s ease 0s;
  }
  .social li:hover {
    transform: scale(1.15) rotate(360deg);
    -webkit-transform: scale(1.1) rotate(360deg);
    -moz-transform: scale(1.1) rotate(360deg);
    -ms-transform: scale(1.1) rotate(360deg);
    -o-transform: scale(1.1) rotate(360deg);
  }
  .social li a {
    color: #EDEFF1;
  }
  .social li:hover {
    border: 2px solid #2c3e50;
    background: #2c3e50;
  }
  .social li a i {
    font-size: 16px;
    margin: 0 0 0 5px;
    color: #EDEFF1 !important;
  }
  .footer-bottom {
    background: #E3E3E3;
    border-top: 1px solid #DDDDDD;
    padding-top: 10px;
    padding-bottom: 10px;
  }
  .footer-bottom p.pull-left {
    padding-top: 6px;
  }
  .payments {
    font-size: 1.5em;	
  }
  </style>
  
  



    </body>
</html>

  
  
<script>
    
    //registration email validation for user
    $(document).ready(function(){
      $('#emailReg').blur(function(){
        var error_email = '';
        var email = $('#emailReg').val();
        var _token = $('input[name="_token"]').val();
        var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    
        if(!filter.test(email))
        {    
          $('#error_email').html('<label class="text-danger">بريد الكتروني غير صحيح</label>');
          $('#emailReg').addClass('has-error');
          $('#register').attr('disabled', 'disabled');
        }
        else
        {
          $.ajax({
            url:"{{ route('email_available.check') }}",
            method:"POST",
            data:{email:email, _token:_token},
            success:function(result)
            {
              if(result == 'unique')
              {
                $('#error_email').html('<label class="text-success">هذا البريد الالكتروني متاح لك</label>');
                $('#emailReg').removeClass('has-error');
                $('#register').attr('disabled', false);
              }
              else
              {
                $('#error_email').html('<label class="text-danger">هذا البريد الالكتروني غير متاح</label>');
                $('#email').addClass('has-error');
                $('#register').attr('disabled', 'disabled');
              }
            }
          })
        }
      });
    
      //name registration validation for user
      $('#nameReg').blur(function(){
        var error_name = '';
        var name = $('#nameReg').val();
        var _token = $('input[name="_token"]').val();
    
        $.ajax({
          url:"{{ route('name_available.check') }}",
          method:"POST",
          data:{name:name, _token:_token},
          success:function(result)
          {
            if(result == 'unique')
            {
              $('#error_name').html('<label class="text-success">هذا الاسم متاح لك</label>');
              $('#nameReg').removeClass('has-error');
              $('#register').attr('disabled', false);
            }
            else
            {
              $('#error_name').html('<label class="text-danger">هذا الاسم غير متاح</label>');
              $('#nameReg').addClass('has-error');
              $('#register').attr('disabled', 'disabled');
            }
          }
        })
        
      });
    
      //email registration validation for customer
      $('#emailRegCust').blur(function(){
        var error_emailRegCust = '';
        var email = $('#emailRegCust').val();
        var _token = $('input[name="_token"]').val();
        var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    
    
        if(!filter.test(email))
        {    
          $('#error_emailRegCust').html('<label class="text-danger">بريد الكتروني غير صحيح</label>');
          $('#emailRegCust').addClass('has-error');
          $('#registerCust').attr('disabled', 'disabled');
        }
        else
        {
          $.ajax({
            url:"{{ route('email_cust_available.check') }}",
            method:"POST",
            data:{email:email, _token:_token},
            success:function(result)
            {
              if(result == 'unique')
              {
                $('#error_emailRegCust').html('<label class="text-success">هذا البريد الالكتروني متاح لك</label>');
                $('#emailRegCust').removeClass('has-error');
                $('#registerCust').attr('disabled', false);
              }
              else
              {
                $('#error_emailRegCust').html('<label class="text-danger">هذا البريد الالكتروني غير متاح</label>');
                $('#emailRegCust').addClass('has-error');
                $('#registerCust').attr('disabled', 'disabled');
              }
            }
          })
        }
        
      });
    
      //email check for comany login
      $('#companyEmailLogin').keyup(function(){
          var error_CompanyLoginEmail = '';
          var email = $('#companyEmailLogin').val();
          var _token = $('input[name="_token"]').val();
      
            $.ajax({
              url:"{{ route('email_true.check') }}",
              method:"POST",
              data:{email:email, _token:_token},
              success:function(result)
              {
                if(result == 'found')
                {
                  $('#error_CompanyLoginEmail').html('<label class="text-success"></label>');
                  $('#companyEmailLogin').removeClass('has-error');
                  $('#loginCompany').attr('disabled', false);
                }
                else
                {
                  $('#error_CompanyLoginEmail').html('<label class="text-danger">هذا البريد الالكتروني غير صحيح </label>');
                  $('#companyEmailLogin').addClass('has-error');
                  $('#loginCompany').attr('disabled', 'disabled');
                }
              }
            })
          
        });
    
    
       //password check for comany login
        $('#companyPasswordLogin').keyup(function(){
          var error_CompanyLoginPassword = '';
          var password = $('#companyPasswordLogin').val();
          var email = $('#companyEmailLogin').val();
          var _token = $('input[name="_token"]').val();
          
            $.ajax({
              url:"{{ route('password_company.check') }}",
              method:"POST",
              data:{password:password, email:email, _token:_token},
              success:function(result)
              {
                if(result == 'found')
                {
                  $('#error_CompanyLoginPassword').html('<label class="text-success"></label>');
                  $('#companyPasswordLogin').removeClass('has-error');
                  $('#loginCompany').attr('disabled', false);
                }
                else
                {
                  $('#error_CompanyLoginPassword').html('<label class="text-danger">كلمة المرور و البريد الالكتروني غير متطابقان </label>');
                  $('#companyPasswordLogin').addClass('has-error');
                  $('#loginCompany').attr('disabled', 'disabled');
                }
              }
            })
          
        });

    
      

    
      
    });
    
    </script>
    