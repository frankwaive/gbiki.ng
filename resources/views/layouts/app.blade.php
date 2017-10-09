<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield ('PageTitle')</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">

    <script src="{{ asset('js/tinymce/jquery.tinymce.min.js') }}"></script>
    <script src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">


                                    <div class="pull-left col-xs-3 col-md-6">
                                            <!-- Branding Image -->
                                            <a class="navbar-brand" href="{{ url('/') }}">
                                                <img class="logo" src="{{asset('gbiki.png')}}" alt="Gbiki.com" />
                                            </a>
                                    </div>



            <div class="pull-right col-xs-9 col-md-6 nav-extras">
                    <!-- Collapsed Hamburger -->

                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
            
                        @if (Auth::guest())
                         <ul class="top-name liz">
                            <li class="user"><a href="{{ url('/login') }}">Login</a></li>
                            <li class="user"><a href="{{ url('/register') }}">Register</a></li>
                        </ul>
                        @else
                         <ul class="top-name liz">
                
            
                                                <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"charset="" data-original-title="Profile and settings">
                        <img src="{{asset('storage/'.Auth::user()->avatar)}}"  class="Avatar Avatar--size32"/> 
                            <span class="caret"></span>
                        </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                     <span class="fa fa-btn fa-sign-out"> </span>
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                    <li aria-hidden="true"><a href="{{url('/')}}/profile/{{ Auth::user()->slug }}"> 
                                        <span class="fa fa-btn fa-user-o"> </span>Profile</a></li>

                                    <li><a href="{{url('/post/create')}}"> 

                                    <span class="fa fa-btn fa-user"> </span>
                                    Create Post</a></li>
                                </ul>
                            </li>


@if(empty(count(auth()->user()->unreadNotifications))

                    <li id="markasunread">
                                                    <a>
                                                        <span class="badge fa fa-bell"> {{count(auth()->user()->unreadNotifications)}} </span>
                                                    </a>
                    </li>
                            
@else
                    <li class="dropdown" id="markasunread">
                                                    <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"charset="" data-original-title="Profile and settings">
                                                        <span class="badge fa fa-bell"> {{count(auth()->user()->unreadNotifications)}} </span>
                                                    </a>


                                                    <ul class="dropdown-menu" role="menu">

                                                        <?php $user= Auth::user(); ?>
                                                            @foreach ($user->unreadNotifications as $notification) 

                                                        <li>
                                                            
                                                              @include('notification.'.snake_case(class_basename($notification->type))) 

                                                        </li>
                                                        
                                                        @endforeach
                                                    </ul>
                    </li>
@endif



                            </li>
                           
                        @endif

</div>
            </div>
    

                </div>

                <div class="collapse navbar-collapse dafe" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->


                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right breadcrumb">

                     <?php
                    $categories = \DB::table('categories')->get(); ?>
                     @foreach ($categories as $category)
                        <li><a href="{{url('/category/'. $category->slug)}}"> {{ $category->category_name }}</a></li>
                    @endforeach
                        
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>






  <footer class="navbar-fixed-bottom">

<div class="container">


  <p class="col-md-6">

  &reg; Copyright &copy; <?php echo date('Y'); ?> @yield ('PageTitle')</h5>
  </p>

  <p class="col-md-6">
    <a href="privacy.php">Privacy   |</a>
    <a href="about.php">|   About   |</a>
    <a href="">|   Webmail   |</a>
    <a href="contact.php">|   Contact</a>

</p>
</div>
</footer>


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/foundation.min.js') }}"></script>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/what-input.js') }}"></script>
    <script src="{{asset('js/main.js')}}"></script>

    


  

</body>
</html>
