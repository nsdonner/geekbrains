@extends('layout')
@section('css')
    <link rel="stylesheet" href="{{asset('/css/style_task.css')}}">

@stop

@section('content')

    <main class="container">
        <h1 class="title">Задача</h1>

        <ul class="nav nav-tabs" id="userTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#projects-tab" role="tab">Содержание</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#invites-tab" role="tab">Участники <span class="badge badge-primary badge-pill">7</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#settings-tab" role="tab">Результат</a>
            </li>
        </ul>

        <div id="part_general" class="active">
            <div class="head-top">
                <div class="head-left">
                    <div class="area-name">
                        <div class="txt-status">Название:</div>
                        <input type="text" name="task_name" class="form-control" id="inputTaskName" value="Задача на 1-ую неделю октября">
                    </div>
                </div>
                <div class="head-right">
                    <div class="area-status">
                        <div class="txt-status">Статус:</div>
                        <div class="btn-group from_product_user_value">
                            <div class="btn btn-default btn-width">
                                <div class="select_text" id="select_text_status">В работе</div>
                            </div>
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                <span class="caret"></span>
                                <span class="sr-only">Меню с переключением</span>
                            </button>
                            <ul class="dropdown-menu btn-width-list" role="menu" id="ctrlStatus">
                                <li><div class="menu_item_dropdown menu_item_dropdown_color">
                                        <div class="option_text">В работе</div>
                                    </div></li>
                                <li><div class="menu_item_dropdown menu_item_dropdown_color">
                                        <div class="option_text">Выполнено</div>
                                    </div></li>
                                <li><div class="menu_item_dropdown menu_item_dropdown_color">
                                        <div class="option_text">Отклонено</div>
                                    </div></li>
                                <li><div class="menu_item_dropdown menu_item_dropdown_color">
                                        <div class="option_text">Приостановлено</div>
                                    </div></li>
                            </ul>
                        </div>
                    </div>
                    <div class="area-dateline">
                        <div class="txt-status">Срок:</div>
                        <input type="date" name="task_dateline" class="form-control" id="inputTaskDateline" value="">
                    </div>
                    <div class="area-author">
                        <div class="txt-status">Авторство:</div>
                        <div class="txt-value">01.10.2017 (Черняков С.И., p...@mail.ru)</div>
                    </div>
                </div>
            </div>
            <div class="head-second">
                <div class="txt-status">Описание:</div>
                <textarea name="task_description" class="form-control-full" id="inputTaskDescription">Описание</textarea>
                <div class="area-type">
                    <div class="txt-status">Тип задачи:</div>
                    <div class="btn-group from_product_user_value">
                        <div class="btn btn-default btn-width">
                            <div class="select_text" id="select_text_type">Генерация идей</div>
                        </div>
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            <span class="caret"></span>
                            <span class="sr-only">Меню с переключением</span>
                        </button>
                        <ul class="dropdown-menu btn-width-list" role="menu" id="ctrlType">
                            <li><div class="menu_item_dropdown menu_item_dropdown_color">
                                    <div class="option_text">Генерация идей</div>
                                </div></li>
                            <li><div class="menu_item_dropdown menu_item_dropdown_color">
                                    <div class="option_text">Голосование</div>
                                </div></li>
                            <li><div class="menu_item_dropdown menu_item_dropdown_color">
                                    <div class="option_text">Ознакомление</div>
                                </div></li>
                            <li><div class="menu_item_dropdown menu_item_dropdown_color">
                                    <div class="option_text">Согласование</div>
                                </div></li>
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
                <div class="process_row">
                    <input type="hidden" name="idea_id" value=1 class="idea_id">
                    <div class="pr_number">
                        <div class="idea_number_value"> 1 </div>
                    </div>
                    <a href="/" class="area_href"><div class="pr_idea area_href">
                            <div class="idea_number_value"> Моя идея </div>
                            <i class="fa fa-id-card-o idea_open"></i>
                        </div></a>
                    <div class="pr_author">
                        <div class="idea_number_value">Черняков С.И.</div>
                    </div>
                    <div class="pr_date">
                        <div class="idea_number_value"> 01.10.2017 16:41:00 </div>
                    </div>
                    <div class="pr_delete">
                        <i class="fa fa-times-circle idea_delete"></i>
                    </div>
                </div>

                <div class="line_separate"></div>
                <div class="process_row">
                    <input type="hidden" name="idea_id" value=2 class="idea_id">
                    <div class="pr_number">
                        <div class="idea_number_value"> 2 </div>
                    </div>
                    <a href="/" class="area_href"><div class="pr_idea area_href">
                            <div class="idea_number_value"> Еще одна идея </div>
                            <i class="fa fa-id-card-o idea_open"></i>
                        </div></a>
                    <div class="pr_author">
                        <div class="idea_number_value">Иванов И.И.</div>
                    </div>
                    <div class="pr_date">
                        <div class="idea_number_value"> 01.10.2017 16:58:00 </div>
                    </div>
                    <div class="pr_delete">
                        <i class="fa fa-times-circle idea_delete"></i>
                    </div>
                </div>

                <div class="line_separate"></div>
                <div id="idea_add" class="pr_add">
                    <i class="fa fa-plus-square idea_add"></i>
                </div>
            </div>

            <div class="line_separate_main"></div>

            <h3 class="subtitle">Коментарии</h3>
            <div class="process_table">
                <div class="current_comment">
                    <div class="comment_avatar">
                        <img src="../project/img/avatar.jpg" class="avatar_pic">
                    </div>
                    <div class="comment_content">
                        <div class="comment_author">Черняков Станислав:</div>
                        <div class="comment__message">
                            <textarea name="comment_new" class="comment_text" id="inputComment_new">Мой комментарий</textarea>
                        </div>
                        <div id="msg_add" class="comment_add">
                            <i class="fa fa-plus-square msg_add"></i>
                        </div>
                    </div>
                </div>
                <div class="line_separate"></div>
                <div class="comment_row">
                    <input type="hidden" name="comment_id" value=1 class="comment_id">
                    <div class="comment_avatar">
                        <img src="../project/img/avatar.jpg" class="avatar_pic">
                    </div>
                    <div class="comment_content">
                        <div class="comment__message">
                            <div class="comment_author">[08.10.2017 17:45:00] Черняков Станислав:</div>
                            <div class="comment_delete">
                                <i class="fa fa-times-circle msg_delete"></i>
                            </div>
                        </div>
                        <div class="comment__message">
                            <div class="comment_text">Мой комментарий</div>
                        </div>
                    </div>
                </div>
                <div class="line_separate"></div>
                <div class="comment_row">
                    <input type="hidden" name="comment_id" value=2 class="comment_id">
                    <div class="comment_avatar">
                        <img src="../project/img/avatar.jpg" class="avatar_pic">
                    </div>
                    <div class="comment_content">
                        <div class="comment__message">
                            <div class="comment_author">[08.10.2017 17:00:00] Черняков Станислав:</div>
                            <div class="comment_delete">
                                <i class="fa fa-times-circle msg_delete"></i>
                            </div>
                        </div>
                        <div class="comment__message">
                            <div class="comment_text">Мой комментарий первый Мой комментарий первый Мой комментарий первый Мой комментарий первый Мой комментарий первый Мой комментарий первый Мой комментарий первый Мой комментарий первый Мой комментарий первый </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="part_participants">
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

        <div id="part_result">
            <h3 class="subtitle">Результат</h3>

            <textarea name="task_result" class="form-control-full" id="inputResult">Здесь заключение по задаче</textarea>
        </div>
    </main>
@stop
