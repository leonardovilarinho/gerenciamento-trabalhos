@extends('template.template')

@section('title', 'Vincular a um curso')

@section('content')
<article class="col-md-9 col-md-offset-3">
    <div class="m-b-md row">
        <div class="panel panel-default" style="text-align: center;">
            <h3>Incluir '{{ $user->name }}' em um curso</h3>
            <hr>
            <div class="panel-body">
                {!! Form::open(['url' => ($type == 'teacher' ? 'teacher/' : 'student/') . $user->id . '/link', 'method' => 'post']) !!}

                    <div class="form-group text-right">
                        {{ Form::label('course', 'Selecione um curso') }}
                        {{ Form::select('course', $courses, null, ['class' => 'form-control']) }}
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
