<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Primeiro acesso</title>

        <!-- Fonts -->
        {{ Html::style('css/bootstrap.min.css') }}
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="m-b-md">
                    <h2>Cadastrar primeiro administrador</h2>
                    <p>Esse é seu primeiro acesso ao site, precisamos de um administrador para começar o sistema, cadastre-o no formulário abaixo:</p>

                    <div class="panel panel-default">
                        <div class="panel-body">
                        {!! Form::open(['url' => '/primeiro-acesso', 'method' => 'post']) !!}

                            <h4 class="text-left">Sobre o administrador:</h4>

                            <div class="form-group">
                                {{ Form::label('email', 'Endereço de email') }}
                                {{ Form::text('email', '', ['class' => 'form-control', 'required']) }}
                            </div>

                            <div class="form-group">
                                {{ Form::label('name', 'Nome completo') }}
                                {{ Form::text('name', '', ['class' => 'form-control', 'required']) }}
                            </div>

                            <div class="form-group row">

                                <div class="col-md-6">
                                    {{ Form::label('username', 'Usuário') }}
                                    {{ Form::text('username', '',  ['class' => 'form-control', 'required']) }}
                                </div>

                                <div class="col-md-6">
                                    {{ Form::label('password', 'Senha') }}
                                    {{ Form::password('password', ['class' => 'form-control', 'required']) }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-8 text-danger">
                                    {{$errors->first()}}
                                </div>

                                <div class="col-md-4 text-right">
                                    {{  Form::submit('Registrar e iniciar', ['class' => 'btn btn-default']) }}
                                </div>
                            </div>
                        {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>