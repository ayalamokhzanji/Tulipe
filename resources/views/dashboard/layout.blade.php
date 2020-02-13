

<!DOCTYPE html>

<html lang="en"  dir="rtl" >

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Light Bootstrap Dashboard - Free Bootstrap 4 Admin Dashboard by Creative Tim</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->

    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/light-bootstrap-dashboard.css?v=2.0.0 " rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->

</head>

<!-- <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"> -->

<link href="https://fonts.googleapis.com/css?family=Aref+Ruqaa:400,700&display=swap&subset=arabic" rel="stylesheet"> 
<style type="text/css">
    body {
        font-family: 'Aref Ruqaa', serif;
        color: #566787;
        background: #f5f5f5;
	
    }

    </style>
<body>
    <div class="wrapper">
        <div class="sidebar" >
            <!--data-image="img/sidebar-5.jpg"
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->
    <div class="sidebar-wrapper">
        <div class="logo">
            <a class="simple-text">
               اسم المؤسسة
            </a>
        </div>
        <ul class="nav">
        @if(!Auth::user()->hasRole('superadministrator'))
            <li class="nav-item ">
                <a class="nav-link" href="dashboard">
                    <i class="nc-icon nc-chart-pie-35"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li>
                <a class="nav-link active" href="/user">
                    <i class="nc-icon nc-circle-09"></i>
                    <p>البيانات المؤسسة</p>
                </a>
            </li>
            <li>
                <a class="nav-link" href="/table">
                    <i class="nc-icon nc-notes"></i>
                    <p>الحجوزات</p>
                </a>
            </li>
            <li>
                <a class="nav-link" href="{{ url('/messages') }}">
                    <i class="nc-icon nc-paper-2"></i>
                    <p>الرسائل</p>
                </a>
            </li>
            

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                الخدمات
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="{{ url('/services') }}">اضافة خدمة</a>
                    <a class="dropdown-item" href="#">Another action</a>
                </div>
            </li>

            <li>
                <a class="nav-link" href="/Post">
                    <i class="nc-icon nc-bell-55"></i>
                    <p>اعلانات</p>
                </a>
            </li>

            @endif
            <li>
<!-- 
            @if(Auth::user()->hasRole('superadministrator'))
            <li class="nav-item ">
                <a class="nav-link" href="/admin/home">
                    <i class="nc-icon nc-chart-pie-35"></i>
                    <p>البيانات الشخصيه</p>
                </a>
            </li>
            <li>
                <a class="nav-link active" href="/PostAdmin">
                    <i class="nc-icon nc-circle-09"></i>
                    <p>الاعلانات</p>
                </a>
            </li>
            <li>
                <a class="nav-link" href="/UserDetails">
                    <i class="nc-icon nc-notes"></i>
                    <p>بيانات المستخدمين</p>
                </a>
            </li>
            <li>
                <a class="nav-link" href="/adminmessage">
                    <i class="nc-icon nc-paper-2"></i>
                    <p>الرسائل</p>
                </a>
            </li>
          

            @endif -->
        </ul>
        
    </div>
</div>
<div class="main-panel">
             <!-- Navbar -->
             <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                 <div class="container-fluid">
                     <a class="navbar-brand" href="#pablo"> Dashboard </a>
                     <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                         <span class="navbar-toggler-bar burger-lines"></span>
                         <span class="navbar-toggler-bar burger-lines"></span>
                         <span class="navbar-toggler-bar burger-lines"></span>
                     </button>
                     <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                 </div>
             </nav>
    <div class="container-fluid content">     
        @yield('content')
    </div> 



</body>
<!--   Core JS Files   -->
<script src="../assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="../assets/js/core/bootstrap.min.js" type="text/javascript"></script>

<script src="../assets/js/light-bootstrap-dashboard.js?v=2.0.0 " type="text/javascript"></script>

</html>
