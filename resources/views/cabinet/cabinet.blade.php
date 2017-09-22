@extends('layout')
@section('css')

@stop

@section('content')

    <main class="container">
        <div class="row">
            <div class="col-md-4"><img class="img-thumbnail" src="{{ asset('/img/'.$photo)}}" alt="$user_name"></div>
            <div class="col-md-8">
                <div class="user-name">{{$name}}</div>
                <ul class="nav nav-tabs" id="userTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#projects-tab" role="tab">Проекты</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#invites-tab" role="tab">Приглашения <span class="badge badge-primary badge-pill">1</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#settings-tab" role="tab">Настройки</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane active" id="projects-tab" role="tabpanel">
                        <div id="current-projects">
                            <h4> Текущие проекты:</h4>
                            <div class="projects-tab">
                                <div class="project-name"><a href="#">Планы на вечер #3</a></div>
                                <div class="progect-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo, accusantium maxime labore facilis nulla blanditiis, tenetur recusandae aspernatur modi quidemr.</div>
                            </div>
                        </div>
                        <div class="completed-projects">
                            <h4>Заверщенные проекты:</h4>
                            <div class="projects-tab">
                                <div class="project-name"><a href="#">Планы на вечер #1</a></div>
                                <div class="progect-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo, accusantium maxime labore facilis nulla blanditiis, tenetur recusandae aspernatur modi quidem.</div>
                            </div>
                            <div class="projects-tab">
                                <div class="project-name"><a href="#">Планы на вечер #2</a></div>
                                <div class="progect-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo, accusantium maxime labore facilis nulla blanditiis, tenetur recusandae aspernatur modi quidem.</div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="invites-tab" role="tabpanel">
                        <div class="invite">
                            <div class="project-name"><a href="#">Планы на вечер #4</a></div>
                            <div class="project-author">Пинки</div>
                            <div class="invite-btn-group">
                                <button class="btn btn-outline-success">Учавствую!</button>
                                <button class="btn btn-outline-danger">Отказаться</button>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="settings-tab" role="tabpanel">
                        {!!  Form::open(['url' => '/id'.$id ,'method' =>'post' ]) !!}
                        {!! Form::token() !!}
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputUserName" class="col-form-label">Имя пользователя</label>
                                    <input type="text" name="name" class="form-control" id="inputUserName" value="{{$name}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputEmail" class="col-form-label">Email</label>
                                    <input type="email" name="email" class="form-control" id="inputEmail" value="{{$email}}">
                                </div>
                            </div>
                            <div class="form-goup">
                                <label for="inputBio">О себе</label>
                                <textarea class="form-control" id="inputBio" rows="2"></textarea>
                            </div>
                            <button class="btn btn-success" type="submit">Сохранить</button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>

    </main>
@stop
