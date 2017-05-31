@extends('template.template')

@section('title', 'Editar administrador')

@section('sidebar')

<a href="{{url('admin')}}" class="w3-button w3-padding">Voltar atrás</a>

@endsection

@section('content')

<div class="content">
    <div class="m-b-md">
    <article class="col-md-9 col-md-offset-3" style="border-right: 25px solid #eee">
        <div class="panel panel-default">
        <h2>Editar administrador</h2>
            <div class="panel-body">
            {!! Form::open(['url' => 'admin/'.$manager->id.'/edit', 'method' => 'put']) !!}

                <h4 class="text-left">Sobre o administrador:</h4>

                <div class="form-group">
                    {{ Form::label('email', 'Endereço de email') }}
                    {{ Form::text('email', $manager->email, ['class' => 'form-control', 'required' => '', 'readonly' => '']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('name', 'Nome completo') }}
                    {{ Form::text('name', $manager->name, ['class' => 'form-control', 'required' => '']) }}
                </div>

                <div class="form-group row">

                    <div class="col-md-6">
                        {{ Form::label('username', 'Usuário') }}
                        {{ Form::text('username', $manager->username,  ['class' => 'form-control', 'required' => '']) }}
                    </div>

                    <div class="col-md-6">
                        {{ Form::label('password', 'Senha') }}
                        {{ Form::password('password', ['class' => 'form-control']) }}
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-8 text-danger">
                        {{$errors->first()}}
                    </div>
                </div>
                <div style="text-align: center;">
                    {{  Form::submit('Salvar', ['class' => 'btn btn-default']) }}
                </div>
            {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection