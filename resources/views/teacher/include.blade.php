@extends('template.template')

@section('title', 'Entrar no sistema')

@section('sidebar')
<a href="{{url('painel')}}" class="w3-button w3-padding">Voltar atrás</a>

@endsection

@section('content')
<article class="col-md-9 col-md-offset-3" style="border-left: 1px solid #eee">
    <div class="m-b-md row">
        <div class="panel panel-default col-md-10 col-md-offset-1" style="text-align: center;">
        <h3>Incluir Professor</h3>
        <hr>
            <div class="panel-body">
            {!! Form::open(['url' => 'include/displine/teacher', 'method' => 'post']) !!}

                <div class="form-group">
                    {{ Form::label('name', 'Nome do Professor') }}
                    {{ Form::text('name', '..', ['class' => 'form-control', 'required']) }}
                </div>

                @foreach($displines as $displine)
                    <div class="form-group text-right">
                        {{ Form::label('displine[]', $displine->name) }}

                        {{ Form::checkbox('displine[]', $displine->id, in_array($displine->id, $select)) }}
                    </div>
                @endforeach

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

                    <div class="col-md-12 text-right">
                        {{  Form::submit('Salvar', ['class' => 'btn btn-default']) }}
                    </div>
                </div>
            {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
