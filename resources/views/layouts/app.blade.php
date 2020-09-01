<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Cov-aid</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/nav.css') }}" rel="stylesheet">

    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />

    <!-- to do a separate stylesheet than the nav one (with general css), if needed -->
    @yield('style')
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container">
                <div id="logo-name">
                    <a href="{{ url('/') }}"><img src="{{ asset('images/logo.png')}}" alt="logo" id="logo"></a>
                    <a class="navbar-brand">Cov-Aid</a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a id="homeBtn" class="nav-link" href="{{ route('main') }}">{{ __('Home') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('stats')}}">{{ __('Stats') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('posts') }}">{{ __('Posts') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('about-us') }}">{{ __('About Us') }}</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
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
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                @if(Auth::user()->role == "admin" )
                                <!-- Dropdown menu to go to admin pages (Mitchio)-->
                                <a class="dropdown-item" href="{{ route('admin-posts') }}">
                                    {{ __('Manage posts') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('admin-users') }}">
                                    {{ __('Manage users') }}
                                </a>
                                @endif
                                <a class="dropdown-item" href="{{ route('profile') }}">
                                    {{ __('Profile') }}
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
        @yield('banner')

        <main class="py-4">
            @yield('content')
        </main>
    </div>


    <!-- Footer -->
    <footer class="footer-distributed">

        <div class="footer-right">
            <a href="#"><i class="fab fa-facebook"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-linkedin"></i></a>
            <a href="https://github.com/luciana-s/final_project"><i class="fab fa-github"></i></a>
        </div>

        <div class="footer-left">

            <p class="footer-links">
                <a class="link-1" href="{{ route('main') }}">{{ __('Home') }}</a>
                <a class="link-2" href="{{ route('stats') }}">{{ __('Stats') }}</a>
                <a class="link-3" href="{{ route('posts') }}">{{ __('Posts') }}</a>
                <a class="link-4" href="{{ route('about-us') }}">{{ __('About') }}</a>
            </p>

            <p>Cov-Aid 19 &copy; 2020</p>

        </div>

    </footer>

    @yield('js-resources')

</body>

</html>