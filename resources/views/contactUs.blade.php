<html dir="rtl">
@extends('nav')
@section('content')
  <!-- Fonts -->
  <link href="css/main.css" rel="stylesheet" media="all">


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
     
    <link href="https://fonts.googleapis.com/css?family=Aref+Ruqaa:400,700&display=swap&subset=arabic" rel="stylesheet"> 


  
    

<style>
  #cover {
    background: #222 url('https://unsplash.it/1920/1080/?random') center center no-repeat;
    background-size: cover;
    height: 100%;
    text-align: center;
    display: flex;
    align-items: center;
    position: relative;
  }

  #cover-caption {
    width: 100%;
    position: relative;
    z-index: 1;
  }

/* only used for background overlay not needed for centering */
  form:before {
      content: '';
      height: 100%;
      left: 0;
      position: absolute;
      top: 0;
      width: 100%;
      background-color: rgba(0,0,0,0.3);
      z-index: -1;
      border-radius: 10px;
  }
  #contact-email{
    width:100%;
    height:50px;
  }
  input::placeholder{
    font-size:15px;
  }
  
  input[type="email"]
  {
    font-size:15px;
  }
</style>



 <section id="cover" class="min-vh-100 " dir="rtl">
    <div id="cover-caption">
        <div class="container">
            <div class="row text-white">
                <div class="col-xl-7 col-lg-6 col-md-8 col-sm-10 mx-auto text-center form p-4">
                    <h1 class="display-4 py-2 text-truncate">تواصل معنا</h1>
                    <div class="px-2">
                        <form action="{{ url('customer/contactus') }}" method="post" class="justify-content-center">
                        @csrf

                        @auth
                          <div class="form-group">
                                <label  class="sr-only">البريد الالكتروني</label>
                                <input id="contact-email" required name="email" type="email" class="form-control" placeholder="البريد الالكتروني" value="{{ Auth::user()->email }}">
                          </div>

                          @else
                          <div class="form-group">
                              <label  class="sr-only">البريد الالكتروني</label>
                              <input id="contact-email" required name="email" type="email" class="form-control" placeholder="البريد الالكتروني">
                          </div>
                          @endauth
                            
                            <div class="form-group">
                                <label class="sr-only">الرسالة</label>
                                <textarea class="message" style="resize: none;" id="article-ckeditor" required placeholder="الرسالة" class="form-control" name="message"></textarea>
                            </div>
                            <div class= "mb-3">
                              <div>هذه الرسالة يتم ارسالها إلى مسؤول الموقع</div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg p-3 pl-5 pr-5">ارسال</button>
                            <input hidden name="role" value="admin">

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- the textarea view -->
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>
    <script>
        $('.message').ckeditor();
    </script>

@endsection
