@extends('layout')
@section('css')
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        #tab_control {
            margin-top: 3%;
        }

        .tab_content {
            border: solid 3px #0fbdff;
            display: none;
            position: relative;
            margin-top: -3px;
        }

        .tab_content.active {
            display: block;
        }

        h1 {
            text-align: center;
            margin-top: 30px;
            margin-bottom: 30px;
        }

        #tabs li {
            display: inline-block;
            padding: 10px 20px;
            font-size: 20px;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            margin-right: -3px;
            text-align: center;
            border: solid 3px #0fbdff;
        }

        #tabs li:not(.active) {
            cursor: pointer;
            background-color: #0fbdff;
        }

        #tabs li .active {
            background-color: #fff;
        }

        .tab_content_menu li {
            font-size: 20px;
            list-style: decimal;
        }

        .tab_content_menu {
            margin-left: 3%;
            margin-top: 10px;
            margin-bottom: 10px !important;
        }

        .go_project, .send_btn {
            background-color: #0fbdff;
            cursor: pointer;
            color: #000;
        }
        .go_project {
            display: inline-block;
            margin-top: 2px;
        }
        .go_project:hover, .send_btn:hover {
            background-color: #1834fa;
            color: #fff;
        }
        .vote_panel {
            float: right;
        }
        .vote_div {
            width: 40px;
            height: 40px;
            cursor: pointer;
            -webkit-background-size: 100%;
            background-size: 100%;
        }
        .vote_div:hover {
            width: 60px;
            height: 60px;
        }
        .like {
            background-image: url("/img/like-icon.png");
            float: left;
            margin-right: 20px;
        }
        .dislike {
            background-image: url("/img/dislike-icon.png");
            float: right;
        }
        .user_pic {
            background-image: url("/img/user.png");
            height: 40px;
            width: 40px;
        }

        .table td, .table th {
            vertical-align: middle;
        }

        .comment_ta_wrapper {
            width: 40%;
            border: solid 2px #e1e4eb;
            background-color: #fafbfc;
            margin-top: 40px;
            padding: 2%;
        }

        .comment_ta_label{
            display: block;
            margin-bottom: 20px;
            font-size: 20px;
        }

        .comment_ta_wrapper textarea {
            min-height: 80px;
            width: 100%;
            padding-left: 2%;
            padding-top: 2%;
            border: solid 1px #d3d9de;
        }
        .send_btn {
            display: block;
            width: 40%;
            float: right;
            margin-top: 20px;
        }
        .clear{
            clear: both;
        }
    </style>

    <script>
        $(document).ready(function () {
            $('#tabs').children().on('click', function () {
                var target = $(event.target);
                var targetIndex = $('#tabs').children().index(target);

                if (!(target.hasClass('active'))) {
                    $('.active').removeClass('active');
                    target.addClass('active');
                    $('.tab_content').eq(targetIndex).addClass('active');
                }
            });
        });
    </script>
@stop
@section('content')
    <div id="tab_control">

        <ul id="tabs">
            <li class="active">Название идеи</li>
            <li>Функционал для реализации</li>
            <li>Технологии</li>
            <li>Конкуренты</li>
        </ul>

        <div class="tab_content active"><h1>Название идеи</h1></div>
        <div class="tab_content">
            <ol class="tab_content_menu">
                <li>Bootstrap</li>
                <li>Laravel</li>
                <li>React</li>
            </ol>
        </div>
        <div class="tab_content">
            <ol class="tab_content_menu">
                <li>Технология1</li>
                <li>Технология2</li>
                <li>Технология3</li>
            </ol>
        </div>
        <div class="tab_content">
            <ol class="tab_content_menu">
                <li>Конкурент1</li>
                <li>Конкурент2</li>
                <li>Конкурент3</li>
            </ol>
        </div>
        <button type="button" class="btn btn-default go_project">Вернуться к проекту</button>
        <div class="vote_panel">
            <div class="vote_div like"></div>
            <div class="vote_div dislike"></div>
        </div>
        <div class="comment"><h1>Комментирование</h1></div>

        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Фото</th>
                <th>Имя</th>
                <th>Комментарий</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">1</th>
                <td>
                    <div class="user_pic"></div>
                </td>
                <td>Сергей</td>
                <td>Хорошая идея. Можно еще добавить ...</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>
                    <div class="user_pic"></div>
                </td>
                <td>Михаил</td>
                <td>Есть альтернатива для вашего предложения: ...</td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>
                    <div class="user_pic"></div>
                </td>
                <td>Максим</td>
                <td>Идея не очень нравится в связи с ...</td>
            </tr>
            </tbody>
        </table>

        <form action="">
            <div class="comment_ta_wrapper">
            <label for="comment_ta" class="comment_ta_label">Оставьте комментарий</label>
                <textarea name="comment_ta" id="" rows="5" placeholder="Ваш комментарий..."></textarea><br>
                <button class="btn btn-default send_btn">Отправить</button>
                <div class="clear"></div>
            </div>
        </form>
    </div>
@stop