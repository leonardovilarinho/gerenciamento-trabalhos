@extends('template.template')

@section('title', 'Detalhes de ' . $submission->protocol)

@section('content')
<article class="col-md-9 col-md-offset-3">
    <div class="panel panel-default" style="text-align: center;">
        <h3>Detalhes da submissão {{  $submission->protocol }}</h3>
        <hr>
        <div class="panel-body">
        	<div class="form-group col-md-8">
                {{ Form::label('work', 'Trabalho') }}
                {{ Form::text('work', $submission->work->title , ['class' => 'form-control', 'readonly' => '']) }}
            </div>

            <div class="form-group col-md-4">
                {{ Form::label('course', 'Curso') }}
                {{ Form::text('course', $submission->work->room->course->name , ['class' => 'form-control', 'readonly' => '']) }}
            </div>

            <div class="form-group col-md-6">
                {{ Form::label('protocol', 'Protocolo') }}
                {{ Form::text('protocol', $submission->protocol , ['class' => 'form-control', 'readonly' => '']) }}
            </div>

            
            <div class="form-group col-md-6">
                {{ Form::label('value', 'Nota') }}
                {{ Form::number('value', $submission->value , ['class' => 'form-control',  'readonly' => '']) }}
            </div>

            <div class="form-group col-md-12">
                <a class="btn btn-xs btn-danger" href="{{ url('download/submissions!!submission-'.$submission->file.'/'.$submission->id) }}" target="_blank">
                    <i class="glyphicon glyphicon glyphicon-download"></i> Download
                </a>
            </div>

            <table class="table" style="margin-left: 5px ; padding-right: 20px">
	            <thead>
	                <tr>
	                    <th>Estudante</th>
	                    <th>Email</th>
	                </tr>
	            </thead>
	            <tbody style="text-align: left;">
		            @foreach ($submission->students as $student)
		            	<tr>
	                        <td>{{$student->student->user->name}}</td>
	                        <td>{{$student->student->user->email}}</td>
	                    </tr>
	                @endforeach
	            </tbody>
	        </table>
	            

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
            </div>
        </div>
    </div>
@endsection
