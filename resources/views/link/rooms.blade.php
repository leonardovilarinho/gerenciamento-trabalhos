@extends('template.template')

@section('title', 'Vincular a uma turma')

@section('content')
<article class="col-md-9 col-md-offset-3">
    <div class="m-b-md row">
        <div class="panel panel-default" style="text-align: center;">
            <h3>Incluir '{{ $user->name }}' em disciplinas de diversas turmas</h3>
            <hr>
            <div class="panel-body">
                {!! Form::open(['url' => 'student/'. $user->id . '/link', 'method' => 'post']) !!}

                    <table class="table" style="margin-left: 5px ; padding-right: 20px">
                        <thead>
                            <tr>
                                <th>Turma</th>
                                <th>Semestre</th>
                                <th>Curso</th>
                                <th>Matéria</th>
                                <th>Professor</th>
                                <th>Adicionar?</th>
                            </tr>
                        </thead>
                        <tbody style="text-align: left;">
                            @foreach($rooms as $room)
                              <tr>
                                <td>{{$room->id}}</td>
                                <td>{{$room->semester}}</td>
                                <td>{{$room->course->abbreviation}}</td>
                                <td>{{$room->discipline->name}}</td>
                                <td>{{$room->teacher['name']}}</td>
                                <td>
                                    <div class="botao-index">
                                        {{ Form::label('rooms[]', 'Vincular') }}
                                        {{ Form::checkbox('rooms[]', $room->id, in_array($room->id, $exists)) }}
                                    </div>
                                </td>
                              </tr>
                            @endforeach
                        </tbody>
                    </table>

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
                            {{  Form::submit('Adicionar nas turmas', ['class' => 'btn btn-default']) }}
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
