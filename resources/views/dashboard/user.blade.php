@extends('dashboard.layout')
@section('content')
    <!-- google map -->
    
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDlKKCHDkN8JKdZHsB8o2oeQxSI0vQJmzg&callback=initMap">
</script> 
<style>
.carousel-inner {
    position: relative;
    width: 106.5%;
    overflow: hidden;
    margin-right: -31% !important;
}
    </style>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">تعديل البيانات</h4>
                        </div>
                        <div class="card-body">
                            
                            <form action="{{ url('/user/edit') }}" enctype="multipart/form-data" method="post">
                            @csrf
                            {{ method_field('PATCH') }}
                                <div class="row">
                                    <div class="col-md-6 pr-1">
                                        <div class="form-group">
                                            <label> الاسم </label>
                                            <input name="name" type="text" class="form-control" disabled="" placeholder="الاسم" value="{{ $user->first_name }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 px-1">
                                        <div class="form-group">
                                            <label for="email">البريد الالكتروني</label>
                                            <input name="email" type="email" class="form-control" placeholder="البريد الالكتروني" value="{{ $user->email }}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 pr-1">
                                        <div class="form-group">
                                            <label> رقم الهاتف</label>
                                            <input name="phone_number" type="number" class="form-control" placeholder="رقم الهاتف" value="{{ $user->phone_number}}" required> 
                                        </div>
                                    </div>
                                    <div class="col-md-6 pl-1">
                                        <div class="form-group">
                                            <label>رقم الهاتف الثاني</label>
                                            <input name="phone_number2" type="number" class="form-control" placeholder="رقم الهاتف" value="{{ $user_information->phone_number2  }}" >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 pr-1">
                                        <div class="form-group">
                                            <label>صفحة الفيسبوك</label>
                                            <input name="facebook" type="text" class="form-control" placeholder="صفحة الفيسبوك" value="{{ $user_information->facebook }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6 pl-1">
                                        <div class="form-group">
                                            <label>الموقع</label>
                                            <select class=" form-control selectpicker show-tick dropdown-secondary " name="location" id="" data-live-search="true" data-size="6">
                                            @if (!empty($userLocation))
                                                <option  data-tokens="{{ $userLocation->location }}" value="{{ $userLocation->id }}" selected>{{ $userLocation->location }}</option>
                                          
                                                @else
                                                <option  data-tokens="" value=""   selected>اختر موقعك</option>
                                             
                                            @endif

                                                @foreach($locations as $l)
                                                    <option  id="location" data-tokens="{{ $l->location }}" value="{{ $l->id }}">{{ $l->location }}</option>
                                             
                                                @endforeach




                                                @if (!empty($userLocation))
                                               
                                                <input type="text"hidden    name="lng" id="lng"value="{{ $userLocation->longitude }}"  >
                                                <input type="text" hidden  name="lat" id="lat"value="{{ $userLocation->latitude }}" >
                                                
                                                @else
                                              
                                                <input type="text"  hidden  name="lng" id="lng"value="0"  >
                                                <input type="text"hidden   name="lat" id="lat"value="0" >
                                                
                                            @endif
                                                
                                                <!-- <input type="text"    name="location" class="form-control"  > -->
                                            
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                
                                @if(Auth::user()->hasRole('hall'))
                                <div class="row">
                                    <div class="col-md-6 pr-1">
                                        <div class="form-group">
                                            <label>السعر</label>
                                            <input name="price" type="number" class="form-control" placeholder="السعر" value="{{ $user_information->price }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 px-1">
                                        <div class="form-group">
                                            <label>السعة</label>
                                            <input name="capacity" type="number" class="form-control" placeholder="السعة" value="{{ $user_information->capacity }}" required>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                <div class="row">
                                    <div class="col-md-6 pr-1">
                                        <div class="form-group">
                                            <label>صورة أو فيديو</label>
                                            <input name="media" type="file" class="form-control" placeholder="" accept=".png, .jpg, .jpeg, .mp4">
                                        </div>
                                    </div>
                                    <div class="col-md-6 pr-1">
                                        <div class="form-group">
                                            <label>عنوان الصورة أو الفيديو</label>
                                            <input name="title" type="text" class="form-control" placeholder="على ماذا تحتوي الصورة/الفيديو المدخل">
                                        </div>
                                    </div>
                                    
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>وصف تسويقي</label>
                                            <textarea name="description" rows="4" cols="80" class="form-control" placeholder="وصف تسويقي" value="{{ $user_information->description }}" required maxlength="250"> {{ $user_information->description  }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                
                                <button type="submit" class="btn btn-info btn-fill pull-right">تعديل</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                    
                </div>
                
                <div class="col-md-4">
                    <div class="card card-user">
                        <div class="card-image" style="height:350px;">
                            <img src="{{ url('storage/'.$pp->media) }}" height=350px; alt="{{$pp->title}}" title="{{ $pp->title }}">

                        </div>
                        <div class="card-body">
                            <div class="author  mt-3">
                                <!--<a href="#">
                                    <img class="avatar border-gray" src="../assets/img/faces/face-3.jpg" alt="...">
                                    
                                </a>-->
                                <p class="name">
                                    {{$user->name}}
                                </p>
                            </div>
                            <p class="description text-center">
                                {{$user_information->description}}
                            </p>
                        </div>
                        <hr>
                        <div class="button-container mr-auto ml-auto">
                            <a href="#" class="btn btn-simple btn-link btn-icon">
                                <i class="fa fa-facebook-square"></i>
                            </a>
                            <!--<button href="#" class="btn btn-simple btn-link btn-icon">
                                <i class="fa fa-twitter"></i>
                            </button>
                            <button href="#" class="btn btn-simple btn-link btn-icon">
                                <i class="fa fa-google-plus-square"></i>
                            </button>-->

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div  id="map"></div>
    </div>




    <div id="carouselExampleSlidesOnly" class="carousel slide m-auto" data-ride="carousel" style="width:60%;">
        <div class="carousel-inner m-auto">
            <div class="carousel-item active">
                <img class="d-block" width="100%" height="400px;" src="{{ url('storage/'.$pp->media) }}" alt="First slide">
                
            </div>
            
            @foreach($imgs as $img)
                <div class="carousel-item ">
                    <img class="d-block " width="100%" height="400px;" src="{{ url('storage/'.$img->media) }}" alt="First slide">

                    <div class="carousel-caption d-none d-md-block">
                        <form class="deleteImage" method="post" action="user/media/{{$img->id}}" style="display:inline;">
                        {{ csrf_field() }}
                        {{ method_field('delete') }}
                        @if(count($imgs) > 1)
                            <div style="display:inline">
                                <input type="submit" class="btn btn-danger bg-danger text-white mb-2" value="حذف">
                            </div>
                        @else
                            <div style="display:inline">
                                <input type="submit" class="btn btn-danger bg-danger text-white mb-2" value="حذف" disabled>
                            </div>
                        @endif 
                        </form>

                        <form style="display:inline" action="user/meida/title/{{$img->id}}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                            <div style="display:inline">
                                <input type="submit" class="btn btn-primary bg-primary text-white mb-2" value="تعديل">
                            </div>
                            <div class="form-group">
                                <input name="title2" type="text" class="form-control col-md-5 m-auto" placeholder="عنوان الصورة" value="{{ $img->title }}">
                            </div>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleSlidesOnly" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleSlidesOnly" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>



 
  <body>


@endsection
<style type="text/css">
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
    height: 30%;
    width: 64%;
    border: 1px solid black;
    margin-top: -67px;
    margin-right: 15px;
}
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;

      }
    </style>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js">
</script>
    
    <script>
      var map;
      var marker;
     
      function initMap() {
          
        var lat = parseFloat(document.getElementById('lat').value);
   
   if(lat == 0)
   {
    var lng =  13.180161;
   var lat =  32.885353;
   
    console.log("dd")
   }else{
    var lat = parseFloat(document.getElementById('lat').value);
    var lng = parseFloat(document.getElementById('lng').value);
    console.log(lat)
   }
        map = new google.maps.Map(document.getElementById('map'), {
          
            center: {lat: lat, lng: lng},
          
          zoom:14
        });
        var image = 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png';
 
         marker = new google.maps.Marker({
            position: {lat: lat, lng: lng},
            map: map,
            title:"Hello !",

            draggable: true,
            icon: image
        });
    
        google.maps.event.addListener(marker,'dragend',function(){
        console.log( marker.getPosition().lat());
        console.log( marker.getPosition().lng());
        $('#lat').val(marker.getPosition().lat());
        $('#lng').val(marker.getPosition().lng());


        });
      }
      

      
    </script>


            