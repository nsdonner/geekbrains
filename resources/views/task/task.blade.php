@extends('layout')
@section('css')
    <link rel="stylesheet" href="{{asset('/css/style_task.css')}}">

@stop

@section('content')

    <main class="container">
        <input type="hidden" id="id_task" name="id_task" value={{ $general['id_task'] }}>
        <input type="hidden" id="isNew" name="isNew" value={{ $general['isNew'] }}>

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
            <div class="floatleft"><h1 class="title">Задача</h1></div>
        @else
            <div class="floatleft"><h1 class="title">Новая задача</h1></div>
        @endif
        <div class="btn btn-outline-primary" id="btnWrite">
            @if($general['isNew'] == false)
                Записать
            @else
                Создать
            @endif
        </div>

            <div class="clearfix"></div>
        <ul class="nav nav-tabs" id="userTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#part_general" role="tab">Содержание</a>
            </li>
            @if($general['isNew'] == false)
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#part_participants" role="tab">Участники <span class="badge badge-primary badge-pill" id="number_participants">{{ $number_participants }}</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#part_result" role="tab">Результат</a>
            </li>
            @endif
        </ul>

        <div class="tab-content">
        <div id="part_general" class="tab-pane active" role="tabpanel">
            <div class="head-top">
                <div class="head-left">
                    <div class="area-project">
                        <a href="/project/{{ $info['id_project'] }}" class="area_href"><div><div class="txt-status">Проект:</div>
                                <input type="hidden" id="id_project" name="id_project" value={{ $info['id_project'] }}>
                               <div class="idea_number_value_top"> {{ $info['project'] }} </div>
                            </div></a>
                    </div>
                    <div class="area-name">
                        <div class="txt-status">Название:</div>
                        <input type="text" name="task_name" class="form-control" id="inputTaskName" value="{{ $info['name'] }}">
                    </div>
                </div>
                <div class="head-right">
                    <div class="area-status">
                        <div class="txt-status">Статус:</div>
                        <div class="btn-group from_product_user_value">
                            <div class="btn btn-default btn-width">
                                <div class="select_text" id="select_text_status">{{ $info['status'] }}</div>
                            </div>
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                <span class="caret"></span>
                                <span class="sr-only">Меню с переключением</span>
                            </button>
                            <ul class="dropdown-menu btn-width-list" role="menu" id="ctrlStatus">
                                @foreach($statuses as $key=>$v)
                                    <li><div class="menu_item_dropdown menu_item_dropdown_status">
                                            <div class="option_text">{{ $v['name'] }}</div>
                                        </div></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="area-dateline">
                        <div class="txt-status">Срок:</div>
                        <input type="date" name="task_dateline" class="form-control" id="inputTaskDateline" value="{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $info['deadline'])->format('Y-m-d') }}">
                    </div>
                    @if($general['isNew'] == false)
                    <div class="area-author">
                        <div class="txt-status">Авторство:</div>
                        <div class="txt-value">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $info['date_create'])}} ({{ $author }}, {{ $info['user_email'] }})</div>
                    </div>
                    @endif
                </div>
            </div>
            <div class="head-second">
                <div class="txt-status">Описание:</div>
                <textarea name="task_description" class="form-control-full" id="inputTaskDescription">{{ $info['description'] }}</textarea>
                <div class="area-type">
                    <div class="txt-status">Тип задачи:</div>
                    <div class="btn-group from_product_user_value">
                        <div class="btn btn-default btn-width">
                            <div class="select_text" id="select_text_type">{{ $info['type'] }}</div>
                        </div>
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            <span class="caret"></span>
                            <span class="sr-only">Меню с переключением</span>
                        </button>
                        <ul class="dropdown-menu btn-width-list" role="menu" id="ctrlType">
                            @foreach($types as $key=>$v)
                                <li><div class="menu_item_dropdown menu_item_dropdown_type">
                                        <div class="option_text">{{ $v['name'] }}</div>
                                    </div></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            @if($general['isNew'] == false)
            <div class="line_separate_main"></div>

            <h3 class="subtitle">Решение</h3>
            <div class="process_table">
                <div class="font_Title">
                    <div class="pr_number">№</div>
                    <div class="pr_idea">Идея</div>
                    <div class="pr_author">Автор</div>
                    <div class="pr_date">Дата добавления</div>
                    <div class="pr_delete"></div>
                </div>
                <div class="line_separate"></div>
                @foreach($ideas as $key=>$v)
                    <div class="process_row">
                        <input type="hidden" name="idea_id" value={{ $v['id'] }} class="idea_id">
                        <div class="pr_number">
                            <div class="idea_number_value_main"> {{ $loop->index + 1 }}. </div>
                        </div>
                        <a href="/note{{ $v['id'] }}" class="area_href"><div class="pr_idea area_href">
                                <div class="idea_number_value_main"> {{ $v['name'] }} </div>
                            </div></a>
                        <div class="pr_author">
                            <a href="/id{{ $v['id_user'] }}" class="area_href"><div class="pr_user area_href">
                                <div class="idea_number_value_main">{{ $v['author'] }}</div>
                                </div></a>
                        </div>
                        <div class="pr_date">
                            <div class="idea_number_value_main"> {{ $v['date_create'] }} </div>
                        </div>
                        <div class="pr_delete">
                            <i class="fa fa-times-circle idea_delete"></i>
                        </div>
                    </div>

                    <div class="line_separate"></div>
                @endforeach

                <div class="pr_add">
                    <i id="idea_add" class="fa fa-plus-square idea_add"></i>
                </div>
            </div>

            <div class="line_separate_main"></div>

            <h3 class="subtitle">Коментарии</h3>
            <div class="process_table">
                <div class="current_comment">
                    <div class="comment_avatar">
                        <img src="{{ $currentUser['photo'] }}" class="avatar_pic" id="own_pic">
                    </div>
                    <div class="comment_content">
                        <div class="comment_author" id="own_author">{{ $currentUser['info'] }}:</div>
                        <div class="comment__message">
                            <textarea name="comment_new" class="comment_text"  id="inputCommentNew"></textarea>
                        </div>
                        <button id="msg_add" class="btn btn-default send_btn">Отправить</button>
                    </div>
                </div>
                <div id="first_comment_place" class="line_separate margin15top"></div>
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

            @if($general['isNew'] == false)
        <div id="part_participants" class="tab-pane" role="tabpanel">
            <h3 class="subtitle">Участники</h3>
            <div class="process_table">
                <div class="font_Title">
                    <div class="pr_number">№</div>
                    <div class="pr_participant">Участник</div>
                    <div class="pr_weight">-</div>
                    <div class="pr_isCurator">Куратор</div>
                    <div class="pr_delete"></div>
                </div>
                <div class="line_separate"></div>
                @foreach($participants as $key=>$v)
                <div class="process_row">
                    <input type="hidden" name="participant_id" value={{ $v['id_user'] }} class="participant_id">
                    <div class="pr_number">
                        <div class="idea_number_value"> {{ $loop->index + 1 }}. </div>
                    </div>
                    @if(true == true)
                        <div class="btn-group edit_participant">
                            <div class="btn btn-default btn-width">
                                <div class="select_text" id="select_text_type">{{ $info['type'] }}</div>
                            </div>
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                <span class="caret"></span>
                                <span class="sr-only">Меню с переключением</span>
                            </button>
                            <ul class="dropdown-menu btn-width-list" role="menu" id="ctrlType">
                                @foreach($types as $keyP=>$vP)
                                    <li><div class="menu_item_dropdown menu_item_dropdown_type">
                                            <div class="option_text">{{ $vP['name'] }}</div>
                                        </div></li>
                                @endforeach
                            </ul>
                        </div>
                    @else
                        <a href="/id{{ $v['id_user'] }}" class="area_href"><div class="pr_participant area_href">
                                <div class="idea_number_value_main"> {{ $v['info'] }} </div>
                            </div></a>
                    @endif
                    <div class="pr_weight">
                        <div class="idea_number_value"></div>
                        <!--<input type="number" class="idea_number_value" size="1" name="voices" min="0" value="">-->
                    </div>
                    <div class="pr_isCurator">
                        <input type="checkbox" class="idea_number_value" name="isKurator" value="true"
                                @if($v['is_kurator'] == 1)
                                    checked
                                @endif
                        >
                    </div>
                    <div class="pr_delete">
                        <i class="fa fa-pencil idea_delete" id="participant_edit"></i>
                        <i class="fa fa-times-circle idea_delete" id="participant_delete"></i>
                    </div>
                </div>

                <div class="line_separate"></div>
                @endforeach

                <div id="participant_add" class="pr_add">
                    <i id="participant_add" class="fa fa-plus-square idea_add"></i>
                </div>
            </div>
        </div>

        <div id="part_result" class="tab-pane" role="tabpanel">
            <h3 class="subtitle">Результат</h3>

            <textarea name="task_result" class="form-control-full" id="inputResult">{{ $info['result'] }}</textarea>
        </div>
            @endif
        </div>
    </main>
@stop
