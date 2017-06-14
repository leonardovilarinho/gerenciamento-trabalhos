@extends('template.template')

@section('title', 'Data de entrega')

@section('content')
<article class="col-md-9 col-md-offset-3">
    <div class="panel panel-default" style="text-align: center;">
        <h3>Editar data de entrega do trabalho</h3>
        <hr>
        <div class="panel-body">
            {!! Form::open(['url' => 'work/'.$id.'/edit', 'method' => 'post', 'enctype'=> 'multipart/form-data']) !!}


                <div class="form-group col-md-6">
                    {{ Form::label('', 'Data de entrega atual') }}
                    {{ Form::date('', $term, ['class' => 'form-control', 'readonly' => '']) }}
                </div>

                
                <div class="form-group col-md-6">
                    {{ Form::label('term', 'Data de entrega nova') }}
                    {{ Form::date('term', $term, ['class' => 'form-control', 'required' => '']) }}
                </div>

            <hr>

            <hr>
            <div class="row">
                <div class="col-md-8 text-danger">
                @if(isset($erro))
                    {{$erro}}
                @endif

                @if(session('erro'))
                    {{ session('erro') }}
                @endif
                {{ $errors->first() }}
                </div>

                <div class="col-md-8 text-success">
                @if(session('msg'))
                    {{ session('msg') }}
                @endif
                </div>
                <div class="col-md-12 text-right">
                    {{  Form::submit('Finalizar', ['class' => 'btn btn-default']) }}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
