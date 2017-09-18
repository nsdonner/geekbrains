<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
</head>
<body>
<div class="flex-center position-ref full-height">

    <div class="content">
        <div>
            <h1>{{$last_name}}</h1>
            <h1>{{$first_name}}</h1>
            <h1>{{$password}}</h1>
        </div>
    </div>
</div>
</body>
</html>
