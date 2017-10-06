@extends('layout')

@section('css')
    <style>

        body {
            font-family: Raleway,sans-serif;
            font-size: 14px;
            line-height: 1.6;
            color: #636b6f;
        }

        .fix-height {
            height: 22px !important;
        }

        .reg_block {
            margin: 20px auto 0 auto;
        }

        .panel-default {
            border-color: #d3e0e9;
        }
        .panel {
            margin-bottom: 22px;
            background-color: #fff;
            border: 1px solid rgba(0, 0, 0, 0.12);
            border-radius: 4px;
            box-shadow: 0 1px 1px rgba(0,0,0,.05);

        }

        .panel-default>.panel-heading {
            color: #333;
            background-color: #fff;
            border-color: #d3e0e9;
        }

        .panel-heading {
            padding: 10px 15px;
            border-bottom: 1px solid transparent;
            border-top-right-radius: 3px;
            border-top-left-radius: 3px;
        }

        .panel-body {
            padding: 15px;
        }

        form {
            display: block;
            margin-top: 0em;
        }

        .form-horizontal .form-group {
            margin-left: -15px;
            margin-right: -15px;
        }

        .form-group {
            margin-bottom: 15px;
            height: 36px;
        }

        .form-control {
            width: 100%;
            height: 36px;
            padding: 6px 12px;
            background-color: #fff;
            border: 1px solid #ccd0d2;
            border-radius: 4px;
            box-shadow: inset 0 1px 1px #d3e0e9;
            transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
        }

        .form-control, output {
            font-size: 14px;
            line-height: 1.6;
            color: #555;
            display: block;
        }
        
        label{
            float: left;
        }
        
        .input_wrapper {
            float: left;
        }

        .fix_without_col_md_offset {
            height: 30px !important;
            float: left;
        }
        
        .button_wrapper {
            float: left;
        }

        @media(min-width: 500px){
            label {
                padding-top: 10px;
                margin-bottom: 15px;
                text-align: left;
            }
            .panel {
                height: 430px;
            }

        }

        @media (min-width: 768px){
            label {
                padding-top: 9px;
                text-align: right;
            }
            .panel {
                height: 320px;
            }
        }
    </style>

@stop

@section('content')
    <div id="app">
        <div class="container">
            <div class="row">
                <div class="col-md-8 reg_block">
                    <div class="panel panel-default">
                        <div class="panel-heading">Регистрация</div>

                        <div class="panel-body">
                            <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" class="col-md-4 control-label fix-height">Имя</label>

                                    <div class="col-md-6 input_wrapper">
                                        <input id="name" type="text" class="form-control" name="name"
                                               value="{{ old('name') }}" required autofocus>

                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="col-md-4 control-label fix-height">E-Mail</label>

                                    <div class="col-md-6 input_wrapper">
                                        <input id="email" type="email" class="form-control" name="email"
                                               value="{{ old('email') }}" required>

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="col-md-4 control-label fix-height">Пароль</label>

                                    <div class="col-md-6 input_wrapper">
                                        <input id="password" type="password" class="form-control" name="password"
                                               required>

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password-confirm" class="col-md-4 control-label fix-height">Подтвердить
                                        пароль</label>

                                    <div class="col-md-6 input_wrapper">
                                        <input id="password-confirm" type="password" class="form-control"
                                               name="password_confirmation" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-4 fix_without_col_md_offset"></div>
                                    <div class="col-md-6 button_wrapper">
                                        <button type="submit" class="btn btn-primary">
                                            Зарегистрироваться
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
