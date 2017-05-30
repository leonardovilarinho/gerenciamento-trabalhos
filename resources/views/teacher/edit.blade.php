@extends('template.template')

@section('title', 'Cursos')

@section('sidebar')
<a href="{{url('panel')}}" class="w3-button w3-padding">Voltar atrás</a>
@endsection

@section('content')
<article class="col-md-9 col-md-offset-3" style="border-left: 1px solid #eee">
    <div class="m-b-md row">
        <div class="panel panel-default col-md-10 col-md-offset-1" style="text-align: center;">
        <h3>Editar Professor</h3>
        <hr>
            <div class="panel-body">
            {!! Form::open(['url' => 'teacher/' .$teacher->id. '/edit/save', 'method' => 'post']) !!}

                <div class="row">

                    <div class="form-group col-md-8">
                        {{ Form::label('name', 'Nome completo') }}
                        {{ Form::text('name', $teacher->name, ['class' => 'form-control', 'required']) }}
                    </div>

                    <div class="form-group col-md-4">
                        {{ Form::label('email', 'Endereço de email') }}
                        {{ Form::text('email', $teacher->email, ['class' => 'form-control', 'required']) }}
                    </div>
                        {{ Form::hidden('password', '.........') }}
                </div>

                <hr>
                <div class="row">
                    <div class="col-md-8 text-danger">
                    @if(isset($erro))
                        {{$erro}}
                    @endif

                    @if(isset($errors))
                        {{$errors->first()}}
                    @endif

                    @if(session('erro'))
                        {{ session('erro') }}
                    @endif
                    </div>

                    <div class="col-md-12 text-right">
                        {{  Form::submit('Salvar', ['class' => 'btn btn-default']) }}
                    </div>
                </div>
            {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
