@extends('layout')
@section('css')
    <link rel="stylesheet" href="{{asset('/css/style_task.css')}}">

@stop

@section('content')

    <main class="container">
        <h1 class="title">Задача</h1>

        <ul class="nav nav-tabs" id="userTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#part_general" role="tab">Содержание</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#part_participants" role="tab">Участники <span class="badge badge-primary badge-pill">7</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#part_result" role="tab">Результат</a>
            </li>
        </ul>

        <div class="tab-content">
        <div id="part_general" class="tab-pane active" role="tabpanel">
            <div class="head-top">
                <div class="head-left">
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
                                    <li><div class="menu_item_dropdown menu_item_dropdown_color">
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
                    <div class="area-author">
                        <div class="txt-status">Авторство:</div>
                        <div class="txt-value">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $info['date_create'])}} ({{ $author }}, {{ $info['user_email'] }})</div>
                    </div>
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
                                <li><div class="menu_item_dropdown menu_item_dropdown_color">
                                        <div class="option_text">{{ $v['name'] }}</div>
                                    </div></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

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
                            <div class="idea_number_value"> {{ $loop->index + 1 }}. </div>
                        </div>
                        <a href="/idea{{ $v['id'] }}" class="area_href"><div class="pr_idea area_href">
                                <div class="idea_number_value"> {{ $v['name'] }} </div>
                                <i class="fa fa-id-card-o idea_open"></i>
                            </div></a>
                        <div class="pr_author">
                            <div class="idea_number_value">{{ $v['author'] }}</div>
                        </div>
                        <div class="pr_date">
                            <div class="idea_number_value"> {{ $v['date_create'] }} </div>
                        </div>
                        <div class="pr_delete">
                            <i class="fa fa-times-circle idea_delete"></i>
                        </div>
                    </div>

                    <div class="line_separate"></div>
                @endforeach

                <div id="idea_add" class="pr_add">
                    <i class="fa fa-plus-square idea_add"></i>
                </div>
            </div>

            <div class="line_separate_main"></div>

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
                        <div id="msg_add" class="comment_add">
                            <i class="fa fa-plus-square msg_add"></i>
                        </div>
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
        </div>

        <div id="part_participants" class="tab-pane" role="tabpanel">
            <h3 class="subtitle">Участники</h3>
            <div class="process_table">
                <div class="font_Title">
                    <div class="pr_number">№</div>
                    <div class="pr_participant">Участник</div>
                    <div class="pr_isCurator">Куратор</div>
                    <div class="pr_weight">Вес голоса</div>
                    <div class="pr_delete"></div>
                </div>
                <div class="line_separate"></div>
                <div class="process_row">
                    <input type="hidden" name="participant_id" value=1 class="participant_id">
                    <div class="pr_number">
                        <div class="idea_number_value"> 1 </div>
                    </div>
                    <a href="/" class="area_href"><div class="pr_participant area_href">
                            <div class="idea_number_value"> Черняков С.И. </div>
                        </div></a>
                    <div class="pr_isCurator">
                        <div class="idea_number_value"> + </div>
                    </div>
                    <div class="pr_weight">
                        <div class="idea_number_value"> 5 </div>
                    </div>
                    <div class="pr_delete">
                        <i class="fa fa-times-circle idea_delete"></i>
                    </div>
                </div>

                <div class="line_separate"></div>
                <div class="process_row">
                    <input type="hidden" name="participant_id" value=2 class="participant_id">
                    <div class="pr_number">
                        <div class="idea_number_value"> 2 </div>
                    </div>
                    <a href="/" class="area_href"><div class="pr_participant area_href">
                            <div class="idea_number_value">Иванов И.И.</div>
                        </div></a>
                    <div class="pr_isCurator">
                        <div class="idea_number_value"></div>
                    </div>
                    <div class="pr_weight">
                        <div class="idea_number_value"> 1 </div>
                    </div>
                    <div class="pr_delete">
                        <i class="fa fa-times-circle idea_delete"></i>
                    </div>
                </div>

                <div class="line_separate"></div>
                <div id="participant_add" class="pr_add">
                    <i class="fa fa-plus-square idea_add"></i>
                </div>
            </div>
        </div>

        <div id="part_result" class="tab-pane" role="tabpanel">
            <h3 class="subtitle">Результат</h3>

            <textarea name="task_result" class="form-control-full" id="inputResult">Здесь заключение по задаче</textarea>
        </div>
        </div>
    </main>
@stop
