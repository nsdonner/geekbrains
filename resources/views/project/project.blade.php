@extends('layout')

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('/css/project/style.css')}}">
    <style>
        .memberdiv{
            border:1px solid #eaeaea;
            height:20px;
            margin:15px;
            padding:15px;
        }
        table tr {
            border:1px solid #eaeaea;
        }
        .card-text {
            padding:20px;
        }
        .card-header {
            text-align:center;
        }
        .card-item {
            margin-bottom:40px;
        }
        .addtask {
            margin:20px;
        }

    </style>
@stop

@section('content')
    <main id="project">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="jumbotron">
            <h2 class="display-4">{{$project['name']}}</h2>
            <hr class="jumbotron-hr">
            <p class="lead">{{$project['description']}}</p>
        </div>
        <div id="project-menu">
            <ul class="nav nav-tabs" id="userTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#tasks-tab" role="tab">Задачи</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#members-tab" role="tab"> Участники <span class="badge badge-default">{{count($members)}}</span></a>
                </li>
            </ul>
        </div>
        <div class="tab-content">
            <div class="tab-pane active" id="tasks-tab" role="tabpanel">
                    @if(isset($kurator) && $kurator == 1)
                    <a class="btn btn-success addtask" href="/task0?id_project={{$project['id']}}">Добавить задачу</a>
                    @endif
                    <div class="card-group container-fluid">
                        @foreach($tasks as $v)
                            <div class="col-md-6 card-item">
                                <a href="/task{{$v['id']}}" class="card" >
                                    <div class="card-header">
                                        <h1>{{$v['name']}}</h1>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title">{{$v['description']}}</h4>
                                        <div class="card-text">
                                            <ul>
                                                <li>Дата создания: {{$v['date_create']}}</li>
                                                <li style="color:red">Дедлайн: {{$v['deadline']}}</li>
                                                <li>Создатель: {{$v['user_name']}}</li>
                                                <li>Статус: {{$v['type']}}</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-footer"></div>
                                </a>
                            </div>
                        @endforeach
                        @if($tasks == [])
                            <p>У Вас пока нету задач</p>
                        @endif
                    </div>
            </div>
            <div class="tab-pane" id="members-tab" role="tabpanel">
                {!!  Form::open(['url' => '/project/'.$project['id'].'/memberinvite','method' =>'post' ]) !!}
                <div class="form row col-md-6">
                    <div class="form-group col-md-6">
                        <label for="inviteUser" class="col-form-label">Пригласить участника</label>
                        <input type="text" name="inviteUser" class="form-control" id="inviteUser" placeholder="Напишите #ID">
                    </div>

                    <button class="btn btn-success" type="submit">Пригласить</button>
                </div>
                {!! Form::close() !!}
                <table class="memberdiv col-md-8">
                    @if($members)
                    <tr>
                        <th>Имя участника</th>
                        <th>Куратор?</th>
                    </tr>
                        @foreach($members as $v)
                            <tr>
                                <td><a href="/id{{$v['id_user']}}">{{ $v['name']}}</a></td>
                                <td>@if($v['is_kurator'] == 1) Да @else Нет @endif</td>
                            </tr>
                        @endforeach
                    @endif
                </table>
            </div>
        </div>
    </main>
@stop
