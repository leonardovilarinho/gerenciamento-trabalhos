@extends('template.template')

@section('title', 'Disciplinas')

@section('sidebar')
<a href="{{url('panel')}}" class="w3-button w3-padding">Voltar atrás</a>
@endsection

@section('content')
<article class="col-md-9 col-md-offset-3">
    <div class="panel panel-default" style="text-align: center;">
    <h3>Gerenciamento de disciplinas</h3>
    <hr>
        <div class="panel-body">
        {!! Form::open(['url' => '/discipline/new', 'method' => 'post']) !!}

            <div class="row">
                <div class="form-group col-md-6">
                    {{ Form::label('name', 'Nome da Disciplina') }}
                    {{ Form::text('name', '', ['class' => 'form-control', 'required']) }}
                </div>

                <div class="form-group col-md-6">
                    {{ Form::label('courses', 'Curso:') }}
                    @foreach($courses as $course)
                        <div class="form-group text-right">
                            {{ Form::label('courses[]', $course->name) }}

                            {{ Form::checkbox('courses[]', $course->id) }}
                        </div>
                    @endforeach
                </div>
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
                    {{  Form::submit('Cadastrar', ['class' => 'btn btn-default']) }}
                </div>
            </div>
        {!! Form::close() !!}
        </div>
        <br>
         {{ $disciplines->links() }}
        <table class="table" style="margin-left: 5px ; padding-right: 20px">
            <thead>
                <tr>
                    <th>Disciplina</th>
                    <th>Cursos</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody style="text-align: left;">
                @foreach($disciplines as $discipline)
                  <tr>
                    <td>{{$discipline->name}}</td>
                    <td>
                        @foreach($discipline->courses as $course)
                            {{ $course->abbreviation }} |
                        @endforeach
                    </td>
                    <td>
                        <div class="botao-index">
                            <a class="btn btn-xs btn-primary" href="{{ url('discipline/'.$discipline->id.'/edit') }}">
                                <i class="glyphicon glyphicon glyphicon-edit"></i> Editar
                            </a>

                            <a class="btn btn-xs btn-danger" href="{{url('discipline/'.$discipline->id.'/delete') }}">
                                <i class="glyphicon glyphicon glyphicon-trash"></i> Apagar
                            </a>
                        </div>
                    </td>
                  </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
