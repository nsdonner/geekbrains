<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Personal Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    @yield('css')
    <link rel="stylesheet" href="/css/scss/style.css">

</head>
<body>
    <div id="container" class="container-fluid">
        <header>
            <nav class="container navbar navbar-light bg-light">
                <div>
                    <a class="navbar-brand" href="#"><img src="{{ asset('/img/slider_screen.png')}}" alt="idea"> IdeaHub
                    </a>
                    <form class="form-inline">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search" aria-label="Search">
                            <span class="input-group-btn">
                                <button class="btn btn-outline-primary" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
                            </span>
                        </div>
                    </form>
                </div>
                <div>
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