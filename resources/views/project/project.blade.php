@extends('layout')

@section('css')
    <link rel="stylesheet" href="{{ asset('/css/project/style.css')}}">
@stop

@section('content')
    <main id="project">
        <div class="jumbotron">
            <h2 class="display-4">Курсовой проект 2ой четверти</h2>
            <hr class="jumbotron-hr">
            <p class="lead">Нам необходимо выбрать идею курсового проекта</p>
        </div>
        <div id="project-menu">
            <button class="btn btn-success">Добавить задачу</button>
            <button class="btn btn-secondary"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                Участники <span class="badge badge-default">9</span>
            </button>
        </div>
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
    </main>
@stop
