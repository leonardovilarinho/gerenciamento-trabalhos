@extends('template.template')

@section('title', 'Entrar no sistema')

@section('sidebar')

@endsection

@section('content')
<article class="col-md-6 col-md-offset-3" style="border-left: 1px solid #eee">
    <div class="m-b-md row">
        <div class="panel panel-default col-md-10 col-md-offset-1" style="text-align: center;">
        <h3>Entrar no sistema</h3>
        <hr>
            <div class="panel-body">
            {!! Form::open(['url' => '/login', 'method' => 'post']) !!}

                <div class="form-group">
                    {{ Form::label('login', 'Usuário ou Email') }}
                    {{ Form::text('login', '', ['class' => 'form-control', 'required']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('password', 'Senha') }}
                    {{ Form::password('password', ['class' => 'form-control', 'required']) }}
                </div>

                <hr>
                <div class="row">
                    <div class="col-md-8 text-danger">
                    @if(isset($erro))
                        {{$erro}}
                    @endif

                    @if(session('erro'))
                        {{ session('erro') }}
                    @endif
                    </div>

                    <div class="col-md-4 text-right">
                        {{  Form::submit('Entrar no sistema', ['class' => 'btn btn-default']) }}
                    </div>
                </div>
            {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
