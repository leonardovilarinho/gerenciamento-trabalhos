@extends('template.template')

@section('title', 'Gerenciar turmas')

@section('content')
<article class="col-md-9 col-md-offset-3">
    <div class="m-b-md row">
        <div class="panel panel-default" style="text-align: center;">
            <h3>Gerenciamento de turmas</h3>
            <hr>
            <div class="panel-body">
                {!! Form::open(['url' => 'semester/new/save', 'method' => 'post']) !!}

                    <table class="table" style="margin-left: 5px ; padding-right: 20px">
                        <thead>
                            <tr>
                                <th>Turma</th>
                                <th>Semestre</th>
                                <th>Curso</th>
                                <th>Matéria</th>
                                <th>Professor</th>
                                <th>Semestre</th>
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
                                        <select required name="semesters[]" class="form-control">
                                            <option value="1" {{ $room->semester == 1 ? 'selected' : '' }}>1º Semestre</option>
                                            <option value="2" {{ $room->semester == 2 ? 'selected' : '' }}>2º Semestre</option>
                                        </select>
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
                            {{  Form::submit('Salvar edições', ['class' => 'btn btn-default']) }}
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
