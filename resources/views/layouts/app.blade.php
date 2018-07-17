<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Kafa Kafaya') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('assets/js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Kafa Kafaya') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
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
            </div>
        </nav>
        <div class="container">
            <div class="row">
                @if(Auth::check())
                    <div class="col-md-3 py-4">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <a href="{{route('home')}}">Home</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{route('user.profile', ['id' => Auth::user()->name])}}">My Profile</a>
                            </li>
                            @if(Auth::user()->admin)
                            <li class="list-group-item">
                                <a href="{{route('users')}}">Users</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{route('user.create')}}">New User</a>
                            </li>
                            @endif
                            <li class="list-group-item">
                                <a href="{{route('categories')}}">Categories</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{route('tags')}}">Tags</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{route('posts')}}">All Posts</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{route('trashed.post')}}">Trashed Posts</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{route('create.menu')}}">Create New Menu</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{route('create.tag')}}">Create New Tag</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('create.category') }}">Create New Category</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('create.post') }}">Create New Post</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{route('menus')}}">All menus</a>
                            </li>
                            @if(Auth::user()->admin)
                            <li class="list-group-item">
                                <a href="{{route('settings')}}">Settings</a>
                            </li>
                            @endif
                        </ul>
                    </div>
                @endif
                <div class="container col-md-9">
                    <main class="py-4">
                        @include('includes.error')
                        @yield('content')                                  
                    </main>
                </div>
            </div>
        </div>   
    </div>
</body>
</html>
