@extends('layout')
@section('css')
    <link rel="stylesheet" href="{{asset('/css/style_task.css')}}">

@stop

@section('content')

    <main class="container">
        Здесь будет карточка Идеи {{ $id }}
    </main>
@stop
