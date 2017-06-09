@extends('template.template')

@section('title', 'Vincular a uma disciplina')

@section('content')
<article class="col-md-9 col-md-offset-3">
    <div class="m-b-md row">
        <div class="panel panel-default" style="text-align: center;">
            <h3>Incluir '{{ $user->name }}' em uma disciplina de '{{ $course->abbreviation }}'</h3>
            <hr>
            <div class="panel-body">
                {!! Form::open(['url' => ($type == 'teacher' ? 'teacher/' : 'student/') . $user->id . '/link/finish', 'method' => 'post']) !!}
                	{{ Form::hidden('course_id', $course->id) }}
                    <div class="form-group text-right">
                        {{ Form::label('disciplines', 'Escolhas as disciplinas:') }}
                        @foreach($disciplines as $discipline)
                            <div class="form-group text-right">
                                {{ Form::label('disciplines[]', $discipline->name) }}
                                {{ Form::checkbox('disciplines[]', $discipline->id, $discipline->pivot->teacher_id == $user->id) }}
                            </div>
                        @endforeach
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

                        <div class="col-md-8 text-success">
                        @if(session('msg'))
                            {{ session('msg') }}
                        @endif
                        </div>

                        <div class="col-md-12 text-right">
                            {{  Form::submit('Próximo >>', ['class' => 'btn btn-default']) }}
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
