<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{!! csrf_token() !!}" />
    <title>{{ config('app.name', 'Laravel') }}</title>
    <script type="text/javascript" src="/js/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="{{asset('/js/bootstrap.js')}}"></script>

    @if(isset($js) && $js != "")
        <script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
        <script src= {{ $js }} type="text/javascript"></script>
        <meta name="csrf-token" content="{{ csrf_token() }}">
    @endif

    <link rel="stylesheet" href="{{asset('/css/bootstrap-reboot.css')}}">
    <link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/bootstrap-grid.css')}}">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    @yield('css')

    <link rel="stylesheet" href="/css/style.css">
    <style>
        html, body {
            height: 100%;
        }
        ol,ul {
            margin-bottom:0 !important;
        }
        li {
            list-style-type:none;
        }
        main {
            padding-top: 0;
            position: relative;
            padding-bottom: 64px;
            min-height: 100%;
        }
        footer {
            background-color: #e1e1e1;
            padding: 20px 0 20px 10px;

        }
        footer p{
            margin-bottom: 0 !important;
        }
    </style>
</head>
<body class="container">
    <header>

        <nav class="navbar container navbar-toggleable-md navbar-light bg-faded">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="{{asset('/')}}"><img src="{{ asset('/img/slider_screen.png')}}" alt="idea">iDeaHub</a>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/">Главная <span class="sr-only">(current)</span></a>
                    </li>
                </ul>
                @auth
                    <div id="header-bell"><button class="btn btn-outline-primary"><i class="fa fa-bell" aria-hidden="true"></i></button></div>
                    <div class="dropdown">
                            <button class="btn btn-outline-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{Auth::user()->name}}</button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{ route('profile',['id'=>Auth::id()]) }}">Личный кабинет</a>
                                <a href="{{ route('logout') }}" class="dropdown-item"
                                   onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    Выйти
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                        </div>
                    </div>
                @else
                    <a href="{{route('login')}}" class="btn btn-outline-primary">Войти</a>
                @endauth
            </div>
        </nav>
    </header>
        @yield('content')
        <div class="clear"></div>
        <footer class="bg-dark">
            <p>&copy; IdeaHub, 2017. Все права защищены</p>
        </footer>
@yield('scripts')
</body>
</html>