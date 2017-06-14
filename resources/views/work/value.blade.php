@extends('template.template')

@section('title', 'Dar nota')

@section('content')
<article class="col-md-9 col-md-offset-3">
    <div class="panel panel-default" style="text-align: center;">
        <h3>Dar nota a submissão {{ $submission->protocol }}</h3>
        <hr>
        <div class="panel-body">
            {!! Form::open(['url' => 'work/'.$id.'/submission/'.$submission->id.'/edit', 'method' => 'post']) !!}


                <div class="form-group col-md-6">
                    {{ Form::label('', 'Nota atual') }}
                    {{ Form::number('', $submission->value, ['class' => 'form-control', 'readonly' => '']) }}
                </div>

                
                <div class="form-group col-md-6">
                    {{ Form::label('value', 'Nota nova') }}
                    {{ Form::number('value', $submission->value, ['class' => 'form-control', 'required' => '', 'step' => 0.1, 'min' => 0, 'max' => $submission->work->value]) }}
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
