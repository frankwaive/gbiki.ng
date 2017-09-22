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
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img class="logo" src="{{asset('gbiki.png')}}" alt="Gbiki.com" />
                    </a>

<div style="float:right; line-height: 2.5;">
  <ul class="top-name">

                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                        @else
                        
                        <li> <a href="{{url('/profile')}}" style=" background:url('{{Storage::url(''.Auth::user()->avatar)}}'); background-size: cover; width: 40px; height: 40px;  float:right; border-radius: 50%; border: 2px #fff solid;">
                            </a></li>
                       
                                                <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li class="fa fa-btn fa-sign-out">
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                    <li class="fa fa-user-o" aria-hidden="true"><a href="{{url('/profile')}}"> Profile</a></li>
                                    <li class="fa fa-btn fa-user"><a href="{{url('/post/create')}}"> Create Post</a></li>
                                </ul>
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

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/foundation.min.js') }}"></script>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/what-input.js') }}"></script>

    


  

</body>
</html>
