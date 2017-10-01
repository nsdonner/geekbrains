@extends('layout')
@section('css')
    <style>
        .callbacks_container {
            background-color: #efefef;
            padding: 5em 0 0 0;
        }
        .top-nav {

        }

        span.menu {
            display: none;
        }

        .top-nav ul {
            margin: 0;
            padding: 0 0 0;
            text-align: center;
            border-top: 3px solid #006699;
        }

        .top-nav ul li {
            display: inline-block;
            margin: 0 2em;
        }

        .top-nav ul li a {
            font-size: 1.3em;
            color: #006699;
            padding: 2.3em .5em .5em;
            position: relative;
            transition: .5s all;
            text-decoration: none;
            display: flex;
        }

        .top-nav ul li a:before {
            content: '';
            position: absolute;
            background-color: #006699;
            width: 15px;
            height: 15px;
            -webkit-border-radius: 32px;
            border-radius: 32px;
            -moz-border-radius: 32px;
            left: 42%;
            top: -9px;
            transition: .5s all;
        }

        .top-nav ul li a:hover, .top-nav ul li.active a {
            /*color: #DD6900;*/
            color: #fa165e;
        }

        .top-nav ul li a:hover::before, .top-nav ul li.active a::before {
            background-color: #fa165e;
            width: 21px;
            height: 21px;
            top: -12px;
        }

        .banner1 {
            /*background: url(/img/pic8.jpg) no-repeat center;*/
            background-size: cover;
            -webkit-background-size: cover;
            -o-background-size: cover;
            -ms-background-size: cover;
            -moz-background-size: cover;
            min-height: 900px;
        }

        .banner-info {
            margin: 3em auto 0;
            text-align: center;
            /*-- agileits --*/
            background: rgba(0, 0, 0, 0.59);
            width: 57%;
            padding: 53px 53px 68px;
            box-shadow: 0px 0px 3px 0px #737373;
        }

        .banner-info h3 {
            color: #fff;
            font-size: 54px;
            font-family: 'Montserrat', sans-serif;
            text-transform: uppercase;
        }

        .banner-info p {
            color: #fff;
            margin-top: 23px;
            line-height: 2em;
            font-size: 18px;
            font-style: italic;
        }

        /*-- Bubble Float Top --*/
        .bubble-effect {
            margin-top: -27px;
            text-transform: uppercase;
        }

        .hvr-bubble-float-top {
            display: inline-block;
            vertical-align: middle;
            -webkit-transform: translateZ(0);
            transform: translateZ(0);
            box-shadow: 0 0 1px rgba(0, 0, 0, 0);
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
            -moz-osx-font-smoothing: grayscale;
            position: relative;
            -webkit-transition-duration: 0.3s;
            transition-duration: 0.3s;
            -webkit-transition-property: transform;
            transition-property: transform;
            background: #fff;
            padding: 12px 29px;
            font-size: 18px;
            color: #006699;
            font-weight: 600;
            /*border-bottom: 4px solid #006699;*/
            border: 3px solid #006699;
            -webkit-border-radius: 30px;
            -moz-border-radius: 30px;

            border-radius: 30px;

        }

        .hvr-bubble-float-top:hover{
            background-color: #006699;
            color: #fff;
            text-decoration: none;
        }

        /*.hvr-bubble-float-top:before {*/
            /*position: absolute;*/
            /*z-index: -1;*/
            /*content: '';*/
            /*left: calc(45%);*/
            /*top: 0;*/
            /*!*-- w3layouts --*!*/
            /*border-style: solid;*/
            /*border-width: 0 10px 10px 10px;*/
            /*border-color: transparent transparent #fff transparent;*/
            /*-webkit-transition-duration: 0.3s;*/
            /*transition-duration: 0.3s;*/
            /*-webkit-transition-property: transform;*/
            /*transition-property: transform;*/
        /*}*/


        /*.hvr-bubble-float-top:hover,*/
        /*.hvr-bubble-float-top:focus,*/
        /*.hvr-bubble-float-top:active {*/
            /*-webkit-transform: translateY(10px);*/
            /*transform: translateY(10px);*/
            /*color: #fff;*/
            /*background-color: #006699;*/
            /*text-decoration: none;*/

        /*}*/

        /*.hvr-bubble-float-top:hover:before,*/
        /*.hvr-bubble-float-top:focus:before,*/
        /*.hvr-bubble-float-top:active:before {*/
            /*-webkit-transform: translateY(-10px);*/
            /*transform: translateY(-10px);*/
        /*}*/
        
        #banner-wrapper {
            /*background: url(/img/pic8.jpg) round;*/
            padding: 5em 0 5em 0;
        }

        @media (max-width: 1024px) {
            .banner-info {
                margin: 9em auto 0;
                padding: 26px 37px 43px;
            }

            .banner-info h3 {
                font-size: 44px;
            }

            .banner-info p {
                font-size: 15px;
            }

            .banner1 {
                min-height: 800px;
            }
        }

        @media (max-width: 991px) {
            .banner-info h3 {
                font-size: 35px;
            }

            .banner-info p {
                margin-top: 15px;
                font-size: 13px;
            }

            .top-nav ul li a {
                font-size: 1.2em;
                padding: 2em .5em .5em;
            }
        }

        @media (max-width: 768px) {
            .banner-info {
                margin: 6em auto 0;
                padding: 23px 28px 43px;
                width: 65%;
            }

            .banner1 {
                min-height: 700px;
            }

            .top-nav ul li {
                margin: 0 1.5em;
            }
        }

        @media (max-width: 690px) {
            .top-nav ul li a {
                font-size: 1.1em;
            }
        }

        @media (max-width: 660px) {
            .top-nav ul li a {
                font-size: 1em;
            }

            .top-nav ul li {
                margin: 0 1.2em;
            }
        }

        @media (max-width: 600px) {
            .top-nav ul li {
                margin: 0 1em;
            }

            .top-nav ul li a {
                font-size: 0.9em;
            }

            .top-nav ul li a:before {
                left: 38%;
            }

            .top-nav ul li a:hover::before, .top-nav ul li.active a::before {
                width: 20px;
                height: 20px;
            }
        }

        @media (max-width: 480px) {
            .banner-info h3 {
                font-size: 28px;
            }

            .banner-info {
                margin: 4em auto 0;
                padding: 23px 12px 43px;
                width: 71%;
            }

            .banner1 {
                min-height: 600px;
            }

            .top-nav {
                width: 100%;
                border-right: none;
                text-align: center;
                animation: inherit !important;
            }

            .top-nav span.menu {
                display: inline-block;
                position: relative;
                cursor: pointer;
                font-size: 2em;
                color: #FFFFFF;
                font-weight: 900;
            }

            .top-nav ul {
                padding: 0;
                border: none;
            }

            .top-nav ul.nav1 {
                display: none;
                z-index: 999;
                position: absolute;
                width: 100%;
                left: 0;
            }

            .nav1 span {
                display: none;
            }

            .top-nav ul.nav1 li {
                display: block;
                text-align: center;
                background: rgba(0, 0, 0, 0.84);
                margin: 0;
                width: 100%;
                padding: 1px;
                border: 1px solid #fff;
            }

            .top-nav ul li a {
                display: block;
                padding: .8em 0;
                margin: 0;
            }

            .top-nav ul li a:before, .top-nav ul li.active a::before, .top-nav ul li a:hover::before {
                background: none;
            }

            .top-nav {
                margin: 6em 0 5em;
            }
        }

        @media (max-width: 414px) {
            .banner-info {
                width: 82%;
            }
        }

        @media (max-width: 320px) {
            .banner-info h3 {
                font-size: 24px;
            }

            .banner-info p {
                margin-top: 8px;
            }

            .banner-info p {
                line-height: 1.8em;
            }

            .banner-info {
                margin: 3em auto 0;
            }

            .banner1 {
                min-height: 264px;
            }

            .top-nav ul li a:hover::before, .top-nav ul li.active a::before {
                width: 18px;
                height: 18px;
                top: 12px;
            }

            .top-nav ul li a:before {
                left: 26%;
                width: 10px;
                height: 10px;
                top: 16px;
            }
        }
    </style>
@stop
@section('content')
    <div class="callbacks_container">

        <div class="banner1">
            <div class="container">

                <div class="top-nav wow fadeInDownBig animated" data-wow-delay=".5s">
                    <span class="menu wow fadeInDownBig animated" data-wow-delay=".5s">Menu</span>
                    <ul class="nav1">
                        <li class="active"><a href="index.html">Придумай <br> проект</a></li>
                        <li><a href="#" class="scroll">Собери <br> команду</a></li>
                        <li><a href="#" class="scroll">Распредели <br> задачи</a></li>
                        <li><a href="#" class="scroll">?????</a></li>
                        <li><a href="#" class="scroll">Profit!</a></li>
                    </ul>

                </div>

                <div id="banner-wrapper">

                    <div class="banner-info">
                        <h3>IdeaHub</h3>
                        <p>Необходимо записать идеи для проекта и обсудить их с другими людьми? Жми конпку &quot;Начать&quot;</p>
                    </div>
                    <div class="bubble-effect text-center"><a href="" class=" hvr-bubble-float-top scroll">НАЧАТЬ!</a>
                    </div>
                </div>
            </div>

        </div>

        <div class="clearfix"></div>
    </div>
@stop
