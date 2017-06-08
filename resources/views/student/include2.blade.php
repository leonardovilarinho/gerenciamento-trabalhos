@extends('template.template')

@section('title', 'Pt2. Vincular estudante a disciplina')

@section('sidebar')
<a href="{{url('include/displine/student')}}" class="w3-button w3-padding">Voltar atrás</a>

@endsection

@section('content')
<article class="col-md-9 col-md-offset-3" style="border-left: 1px solid #eee">
    <div class="m-b-md row">
        <div class="panel panel-default col-md-10 col-md-offset-1" style="text-align: center;">
        <h3>Incluir Professor</h3>
        <h4>Curso: {{ $course->name }}</h4>
        <hr>
            <div class="panel-body">
            {!! Form::open(['url' => 'include/displine/student/pt2', 'method' => 'post']) !!}
				{{Form::hidden('course_id', $course->id)}}


                 @foreach($disciplines as $discipline)
                    <div class="form-group text-right">
                        {{ Form::label('disciplines[]', $discipline['name']) }}

                        {{ Form::checkbox('disciplines[]', $discipline['id']) }}
                    </div>
                @endforeach

                <div class="form-group text-right">
                    {{ Form::label('student_id', 'Selecione um estudante') }}
                    {{ Form::select('student_id', $students, null, ['class' => 'form-control']) }}
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

                    <div class="col-md-12 text-right">
                        {{  Form::submit('Vincular', ['class' => 'btn btn-default']) }}
                    </div>
                </div>
            {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
