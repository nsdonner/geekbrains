@extends('layout')
@section('css')
    <link rel="stylesheet" href="{{asset('/css/style_idea.css')}}">

@stop

@section('content')

    <div id="tab_control">
        <input type="hidden" id="id_idea" name="id_idea" value={{ $general['id_idea'] }}>
        <input type="hidden" id="id_task" name="id_task" value={{ $info['id_task'] }}>

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

        @if($general['isNew'] == false)
            <h1 class="title">Идея</h1>
        @else
            <h1 class="title">Новая идея</h1>
        @endif
        <div class="btn btn-outline-primary" id="btnWrite">
            @if($general['isNew'] == false)
                Записать
            @else
                Создать
            @endif
        </div>

        <ul id="tabs">
            <li class="active">Название идеи</li>
            <li>Функционал для реализации</li>
            <li>Технологии</li>
            <li>Конкуренты</li>
        </ul>

        <div class="tab_content active">
            <textarea name="idea_name" class="form-control-full" id="inputIdeaName">{{ $info['name'] }}</textarea>
            <!--<h1></h1>-->
        </div>
        <div class="tab_content">
            <textarea name="idea_description" class="form-control-full" id="inputIdeaDescription">{{ $info['description'] }}</textarea>
        <!--<ol class="tab_content_menu">

            </ol>-->
        </div>
        <div class="tab_content">
            <textarea name="idea_technologies" class="form-control-full" id="inputIdeaTechnologies">{{ $info['technologies'] }}</textarea>
        <!--<ol class="tab_content_menu">
                {{ $info['technologies'] }}
            </ol>-->
        </div>
        <div class="tab_content">
            <textarea name="idea_competitors" class="form-control-full" id="inputIdeaCompetitors">{{ $info['competitors'] }}</textarea>
        <!--<ol class="tab_content_menu">
                {{ $info['competitors'] }}
            </ol>-->
        </div>
        <a href="/task{{ $info['id_task'] }}"><button type="button" class="btn btn-default go_project">Вернуться к задаче "{{ $info['task'] }}"</button></a>

        @if($general['isNew'] == false)
            <div class="area-author">
                <div class="txt-status">Авторство:</div>
                <div class="txt-value">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $info['date_create'])}} ({{ $author }}, {{ $info['user_email'] }})</div>
            </div>


            <h3 class="subtitle">Коментарии</h3>
            <div class="process_table">
                <div class="current_comment">
                    <div class="comment_avatar">
                        <img src="{{ $currentUser['photo'] }}" class="avatar_pic">
                    </div>
                    <div class="comment_content">
                        <div class="comment_author">{{ $currentUser['info'] }}:</div>
                        <div class="comment__message">
                            <textarea name="comment_new" class="comment_text" id="inputComment_new"></textarea>
                        </div>
                        <button id="msg_add" class="btn btn-default send_btn">Отправить</button>
                    </div>
                </div>
                <div class="line_separate"></div>
                @foreach($comments as $key=>$v)
                    <div class="comment_row">
                        <input type="hidden" name="comment_id" value={{ $v['id'] }} class="comment_id">
                        <div class="comment_avatar">
                            <img src="{{ $v['user']['photo'] }}" class="avatar_pic">
                        </div>
                        <div class="comment_content">
                            <div class="comment__message">
                                <div class="comment_author">[{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $v['date'])}}] {{ $v['user']['info'] }}:</div>
                                <div class="comment_delete">
                                    <i class="fa fa-times-circle msg_delete"></i>
                                </div>
                            </div>
                            <div class="comment__message">
                                <div class="comment_text">{{ $v['text'] }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="line_separate"></div>
                @endforeach
            </div>
        @endif
    </div>
@stop
