<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Personal Page</title>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="{{asset('/js/bootstrap.js')}}"></script>
    <link rel="stylesheet" href="{{asset('/css/bootstrap-reboot.css')}}">
    <link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/bootstrap-grid.css')}}">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    @yield('css')

    <link rel="stylesheet" href="/css/style.css">
    <style>
        ol,ul {
            margin-bottom:0 !important;
        }
        li {
            list-style-type:none;
        }
    </style>
</head>
<body>
    <div id="container" class="container-fluid">
        <header>
            <nav class="container navbar navbar-light bg-light">
                <div>
                    <a class="navbar-brand" href="#"><img src="{{ asset('/img/slider_screen.png')}}" alt="idea"> IdeaHub
                    </a>
                </div>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link text-primary" href="#">Overview</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-primary" href="#">Specs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-primary" href="#">FAQ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-primary" href="#">Purchase</a>
                        </li>
                    </ul>
                    <div id="header-bell"><button class="btn btn-outline-primary"><i class="fa fa-bell" aria-hidden="true"></i></button></div>
                    <div class="dropdown">
                        <button class="btn btn-outline-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">BR</button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
            </nav>

        </header>
        @yield('content')
        <footer class="bg-dark"></footer>
    </div>
@yield('scripts')
</body>
</html>