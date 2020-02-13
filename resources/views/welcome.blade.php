<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link href="css/welcome.css" rel="stylesheet" media="all">
  
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.3/css/swiper.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.3/js/swiper.min.js"></script>
       <!--nav-->
       @extends('nav')
        <!--nav-->
        @section('content')
        
        <link href="css/welcome.css" rel="stylesheet" media="all">
  
    </head>
            
 
      
    <body>
 

            <div id="main-carousel" class="carousel slide" data-ride="carousel">
    <!-- <div class="topnav">
      توليب  -->

  
           <!-- </div> -->
  

    
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://picsum.photos/1600/501" class="d-block w-100" id="img-carousel" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>It is a long established </h5>
                        <!-- <h2> fact that a reader distracted</h2> -->
                        <a href="#0" class="btn btn-info">MORE INFO</a>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://picsum.photos/1600/502" class="d-block w-100" id="img-carousel" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                       <h5>It is a long established </h5>
                        <!-- <h2> fact that a reader distracted</h2> -->
                        <a href="#0" class="btn btn-info">MORE INFO</a>
                    </div>
                </div>


            </div>
            <a class="carousel-control-prev" href="#main-carousel" role="button" data-slide="prev">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#main-carousel" role="button" data-slide="next">
                <i class="fa fa-angle-right" aria-hidden="true"></i>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <section class="home__form">
            <div class="container">
                <div class="home__form-container text-center">
                     <form>
                        <div class="row">
                            <div class="col">

                                <div class="form-group">

                                    <div class="input-box ">
                                        <input type="text" class="form-control" placeholder="Name *" aria-label="Name" aria-describedby="name" required>
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                           
                            <div class="col-2"><button type="submit" class="btn btn-danger">Submit Now!</button></div>
                        </div>

                    </form>
                </div>
            </div>
        </section>





<div class="container">
    <div class="row text-center mb-3">

    </div>
    
    <div class="row">
                    <!-- Swiper -->
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-img">
                                  <img src="https://img.gaadicdn.com/images/carexteriorimages/upcoming/360x240/Jeep/Jeep-Renegade/047.jpg"></div>
                                <div class="card-body">
                                   <h5>Renault KWID</h5>
                                   <h4 class="pt-1 pb-2">Rs. 5.44-6.77 Lac</h4>
                                 
                                   <button type= "button" class="btn btn-outline-danger btn-block btn-sm">Lets Judge it.</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-img"><img src="https://img.gaadicdn.com/images/carexteriorimages/upcoming/360x240/Jeep/Jeep-Renegade/047.jpg"></div>
                                <div class="card-body">
                                   <h5>Renault KWID</h5>
                                   <h4 class="pt-1 pb-2">Rs. 5.44-6.77 Lac</h4>
                                 
                                   <button type= "button" class="btn btn-outline-danger btn-block btn-sm">Lets Judge it.</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-img"><img src="https://img.gaadicdn.com/images/carexteriorimages/upcoming/360x240/Jeep/Jeep-Renegade/047.jpg"></div>
                                <div class="card-body">
                                   <h5>Renault KWID</h5>
                                   <h4 class="pt-1 pb-2">Rs. 5.44-6.77 Lac</h4>
                                 
                                   <button type= "button" class="btn btn-outline-danger btn-block btn-sm">Lets Judge it.</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-img"><img src="https://img.gaadicdn.com/images/carexteriorimages/upcoming/360x240/Jeep/Jeep-Renegade/047.jpg"></div>
                                <div class="card-body">
                                   <h5>Renault KWID</h5>
                                   <h4 class="pt-1 pb-2">Rs. 5.44-6.77 Lac</h4>
                                 
                                   <button type= "button" class="btn btn-outline-danger btn-block btn-sm">Lets Judge it.</button>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
      <div class="swiper-slide">
          <div class="row">
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-img"><img src="https://img.gaadicdn.com/images/carexteriorimages/upcoming/360x240/Jeep/Jeep-Renegade/047.jpg"></div>
                                <div class="card-body">
                                   <h5>Renault KWID</h5>
                                   <h4 class="pt-1 pb-2">Rs. 5.44-6.77 Lac</h4>
                                 
                                   <button type= "button" class="btn btn-outline-danger btn-block btn-sm">Lets Judge it.</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-img"><img src="https://img.gaadicdn.com/images/carexteriorimages/upcoming/360x240/Jeep/Jeep-Renegade/047.jpg"></div>
                                <div class="card-body">
                                   <h5>Renault KWID</h5>
                                   <h4 class="pt-1 pb-2">Rs. 5.44-6.77 Lac</h4>
                                 
                                   <button type= "button" class="btn btn-outline-danger btn-block btn-sm">Lets Judge it.</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-img"><img src="https://img.gaadicdn.com/images/carexteriorimages/upcoming/360x240/Jeep/Jeep-Renegade/047.jpg"></div>
                                <div class="card-body">
                                   <h5>Renault KWID</h5>
                                   <h4 class="pt-1 pb-2">Rs. 5.44-6.77 Lac</h4>
                                 
                                   <button type= "button" class="btn btn-outline-danger btn-block btn-sm">Lets Judge it.</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-img"><img src="https://img.gaadicdn.com/images/carexteriorimages/upcoming/360x240/Jeep/Jeep-Renegade/047.jpg"></div>
                                <div class="card-body">
                                   <h5>Renault KWID</h5>
                                   <h4 class="pt-1 pb-2">Rs. 5.44-6.77 Lac</h4>
                                 
                                   <button type= "button" class="btn btn-outline-danger btn-block btn-sm">Lets Judge it.</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
      <div class="swiper-slide">
          <div class="row">
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-img"><img src="https://img.gaadicdn.com/images/carexteriorimages/upcoming/360x240/Jeep/Jeep-Renegade/047.jpg"></div>
                                <div class="card-body">
                                   <h5>Renault KWID</h5>
                                   <h4 class="pt-1 pb-2">Rs. 5.44-6.77 Lac</h4>
                                 
                                   <button type= "button" class="btn btn-outline-danger btn-block btn-sm">Lets Judge it.</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-img"><img src="https://img.gaadicdn.com/images/carexteriorimages/upcoming/360x240/Jeep/Jeep-Renegade/047.jpg"></div>
                                <div class="card-body">
                                   <h5>Renault KWID</h5>
                                   <h4 class="pt-1 pb-2">Rs. 5.44-6.77 Lac</h4>
                                 
                                   <button type= "button" class="btn btn-outline-danger btn-block btn-sm">Lets Judge it.</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-img"><img src="https://img.gaadicdn.com/images/carexteriorimages/upcoming/360x240/Jeep/Jeep-Renegade/047.jpg"></div>
                                <div class="card-body">
                                   <h5>Renault KWID</h5>
                                   <h4 class="pt-1 pb-2">Rs. 5.44-6.77 Lac</h4>
                                 
                                   <button type= "button" class="btn btn-outline-danger btn-block btn-sm">Lets Judge it.</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-img"><img src="https://img.gaadicdn.com/images/carexteriorimages/upcoming/360x240/Jeep/Jeep-Renegade/047.jpg"></div>
                                <div class="card-body">
                                   <h5>Renault KWID</h5>
                                   <h4 class="pt-1 pb-2">Rs. 5.44-6.77 Lac</h4>
                                 
                                   <button type= "button" class="btn btn-outline-danger btn-block btn-sm">Lets Judge it.</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
            <!-- Add Arrows -->
            <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>

	</div>
</div>

<script>
 var swiper = new Swiper('.swiper-container', {
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });
</script>




                        <div class="streak streak-md streak-photo" style="background-image:url('https://mdbootstrap.com/img/Photos/Horizontal/Nature/12-col/img(115).jpg')">
                        <div class="flex-center white-text rgba-black-light pattern-1">

                        <div class="container">
  <div class="row">
    <div class='col-md-10 offset-md-1 text-center mb-1 mt-1'>
    <h2>Bootstrap 4 Responsive Quote Carousel</h2>
    </div>
  </div>
  <div class='row'>
    <div class='col-md-10 offset-md-1'>
      <div class="carousel slide sq-crousal4" data-ride="carousel" id="sq-crousal4">
        <!-- Bottom Carousel Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#sq-crousal4" data-slide-to="0" class="active"></li>
          <li data-target="#sq-crousal4" data-slide-to="1"></li>
          <li data-target="#sq-crousal4" data-slide-to="2"></li>
        </ol>
        
        <!-- Carousel Slides / Quotes -->
        <div class="carousel-inner">
        
          <!-- Quote 1 -->
          <div class="carousel-item active">
            <blockquote>
              <div class="row">
                <div class="col-md-10 offset-md-1 d-md-flex d-block text-center text-lg-left">
					<img class="rounded-circle" src="https://www.tutorialrepublic.com/examples/images/clients/4.jpg" style="width: 100px;height:100px;">
					<div class="feedback-text pl-3">
						<p>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit!</p>
						<small>Someone famous</small>
					</div>
                </div>
              </div>
            </blockquote>
          </div>
          <!-- Quote 2 -->
          <div class="carousel-item">
				<blockquote>
					<div class="row">
						<div class="col-md-10 offset-md-1 d-md-flex d-block text-center text-lg-left">
							<img class="rounded-circle" src="https://www.tutorialrepublic.com/examples/images/clients/3.jpg" style="width: 100px;height:100px;">
							<div class="feedback-text pl-3">
								<p>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit!</p>
								<small>Someone famous</small>
							</div>
						</div>
					</div>
				</blockquote>
          </div>
          <!-- Quote 3 -->
          <div class="carousel-item">
            <blockquote>
				<div class="row">
					<div class="col-md-10 offset-md-1 d-md-flex d-block text-center text-lg-left">
						<img class="rounded-circle" src="https://s3.amazonaws.com/uifaces/faces/twitter/mantia/128.jpg" style="width: 100px;height:100px;">
						<div class="feedback-text pl-3">
							<p>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit!</p>
							<small>Someone famous</small>
						</div>
					</div>
                </div>
            </blockquote>
          </div>
        </div>
        
        <!-- Carousel Buttons Next/Prev -->
         <!-- Left and right controls -->
		  <a class="carousel-control-prev" href="#sq-crousal4" data-slide="prev">
			<span class="fa fa-angle-left"></span>
		  </a>
		  <a class="carousel-control-next" href="#sq-crousal4" data-slide="next">
			<span class="fa fa-angle-right"></span>
		  </a>
      </div>                          
    </div>
  </div>
</div>

</div>
</div>
      




<style>
.divider {border: 1px solid #ccc;}
img {width:100%;}

     .swiper-container {
      width: 100%;
      height: 100%;
    }
    .swiper-slide {
      text-align: center;
      font-size: 18px;
      background: #fff;
      /* Center slide text vertically */
      display: -webkit-box;
      display: -ms-flexbox;
      display: -webkit-flex;
      display: flex;
      -webkit-box-pack: center;
      -ms-flex-pack: center;
      -webkit-justify-content: center;
      justify-content: center;
      -webkit-box-align: center;
      -ms-flex-align: center;
      -webkit-align-items: center;
      align-items: center;
    }






	.sq-crousal4 .carousel-indicators li::before {
        width: 15px;height: 15px;background: #444;border-radius: 50%;	border: solid 2px #AAACAE;
	transition: all 0.3s ease 0s;box-shadow: 6px 6px 8px #E9E0E0 inset;}
	.sq-crousal4 .carousel-indicators li.active::before {background: #1870ed;box-shadow: 2px 3px 2px #e5edf8 inset;border-color: #1870ed;}
	.sq-crousal4 .carousel-indicators {bottom: -40px;}
	.sq-crousal4 li {width: 20px;}
	.sq-crousal4 .fa-angle-left {font-size: 45px;color: #444;left: -30px;position: relative;top: -17px;}
	.sq-crousal4 .fa-angle-right {font-size: 45px;color: #444;right: -30px;position: relative;top: -17px;}






</style>

<!-- Section: Blog v.1 -->
<section class="my-5">

  <!-- Section heading -->
  <h2 class="h1-responsive font-weight-bold text-center my-5">Recent posts</h2>
  <!-- Section description -->
  <p class="text-center w-responsive mx-auto mb-5">Duis aute irure dolor in reprehenderit in voluptate velit
    esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa
    qui officia deserunt mollit anim id est laborum.</p>

  <!-- Grid row -->
  <div class="row">

    <!-- Grid column -->
    <div class="col-lg-5">

      <!-- Featured image -->
      <div class="view overlay rounded z-depth-2 mb-lg-0 mb-4">
        <img class="img-fluid" src="https://mdbootstrap.com/img/Photos/Others/img%20(27).jpg" alt="Sample image">
        <a>
          <div class="mask rgba-white-slight"></div>
        </a>
      </div>

    </div>
    <!-- Grid column -->

    <!-- Grid column -->
    <div class="col-lg-7">

      <!-- Category -->
      <a href="#!" class="green-text">
        <h6 class="font-weight-bold mb-3"><i class="fas fa-utensils pr-2"></i>Food</h6>
      </a>
      <!-- Post title -->
      <h3 class="font-weight-bold mb-3"><strong>Title of the news</strong></h3>
      <!-- Excerpt -->
      <p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime
        placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus et aut officiis debitis.</p>
      <!-- Post data -->
      <p>by <a><strong>Carine Fox</strong></a>, 19/08/2018</p>
      <!-- Read more button -->
      <a class="btn btn-success btn-md">Read more</a>

    </div>
    <!-- Grid column -->

  </div>
  <!-- Grid row -->

  <hr class="my-5">

  <!-- Grid row -->
  <div class="row">

    <!-- Grid column -->
    <div class="col-lg-7">

      <!-- Category -->
      <a href="#!" class="pink-text">
        <h6 class="font-weight-bold mb-3"><i class="fas fa-image pr-2"></i>Lifestyle</h6>
      </a>
      <!-- Post title -->
      <h3 class="font-weight-bold mb-3"><strong>Title of the news</strong></h3>
      <!-- Excerpt -->
      <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum
        deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non
        provident.</p>
      <!-- Post data -->
      <p>by <a><strong>Carine Fox</strong></a>, 14/08/2018</p>
      <!-- Read more button -->
      <a class="btn btn-pink btn-md mb-lg-0 mb-4">Read more</a>

    </div>
    <!-- Grid column -->

    <!-- Grid column -->
    <div class="col-lg-5">

      <!-- Featured image -->
      <div class="view overlay rounded z-depth-2">
        <img class="img-fluid" src="https://mdbootstrap.com/img/Photos/Others/img%20(34).jpg" alt="Sample image">
        <a>
          <div class="mask rgba-white-slight"></div>
        </a>
      </div>

    </div>
    <!-- Grid column -->

  </div>
  <!-- Grid row -->

  <hr class="my-5">

  <!-- Grid row -->
  <div class="row">

    <!-- Grid column -->
    <div class="col-lg-5">

      <!-- Featured image -->
      <div class="view overlay rounded z-depth-2 mb-lg-0 mb-4">
        <img class="img-fluid" src="https://mdbootstrap.com/img/Photos/Others/img (28).jpg" alt="Sample image">
        <a>
          <div class="mask rgba-white-slight"></div>
        </a>
      </div>

    </div>
    <!-- Grid column -->

    <!-- Grid column -->
    <div class="col-lg-7">

      <!-- Category -->
      <a href="#!" class="indigo-text">
        <h6 class="font-weight-bold mb-3"><i class="fas fa-suitcase pr-2"></i>Travels</h6>
      </a>
      <!-- Post title -->
      <h3 class="font-weight-bold mb-3"><strong>Title of the news</strong></h3>
      <!-- Excerpt -->
      <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur
        magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro qui dolorem ipsum quia sit amet.</p>
      <!-- Post data -->
      <p>by <a><strong>Carine Fox</strong></a>, 11/08/2018</p>
      <!-- Read more button -->
      <a class="btn btn-indigo btn-md">Read more</a>

    </div>
    <!-- Grid column -->

  </div>
  <!-- Grid row -->

</section>
<!-- Section: Blog v.1 -->

 
@endsection