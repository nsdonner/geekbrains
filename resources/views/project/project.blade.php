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
            <h2 class="display-4">Курсовой проект 2ой четверти</h2>
            <hr class="jumbotron-hr">
            <p class="lead">Нам необходимо выбрать идею курсового проекта</p>
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
                <button class="btn btn-success">Добавить задачу</button>
                    <div class="card-group">
                    <a href="#" class="card" id="brainstorming-card">
                        <div class="card-header"></div>
                        <div class="card-body">
                            <h4 class="card-title">Мозговой штурм</h4>
                            <div class="card-text">
                                <ul>
                                    <li>Главное — количество идей. Не делайте никаких ограничений</li>
                                    <li>Не критекуйте идеи</li>
                                    <li>Необычные и даже абсурдные идеи приветствуются</li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-footer"></div>
                    </a>
                    <a href="#" class="card" id="discussion-card">
                        <div class="card-header">
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Обсуждение</h4>
                            <p class="card-text">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. A eos exercitationem fugiat ratione.
                                Dicta ducimus et ipsum labore officiis quasi quia repudiandae sapiente vitae voluptas. Accusamus
                                at autem odit ratione.
                            </p>

                        </div>
                        <div class="card-footer"></div>
                    </a>
                    <a href="#" class="card" id="vote-card">
                        <div class="card-header bg-success">
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Голосование</h4>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam animi
                                assumenda, atque aut, beatae eaque fuga fugiy.
                            </p>
                        </div>
                        <div class="card-footer"></div>
                    </a>
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
