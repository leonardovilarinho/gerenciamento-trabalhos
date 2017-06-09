@extends('template.template')

@section('title', 'Vincular a uma turma')

@section('content')
<article class="col-md-9 col-md-offset-3">
    <div class="panel panel-default" style="text-align: center;">
        <h3>Incluir trabalho em disciplinas de diversas turmas</h3>
        <hr>
        <div class="panel-body">
            {!! Form::open(['url' => 'work/new', 'method' => 'post', 'enctype'=> 'multipart/form-data']) !!}

                <div class="form-group col-md-6">
                    {{ Form::label('title', 'Nome do trabalho') }}
                    {{ Form::text('title', '', ['class' => 'form-control', 'required' => '']) }}
                </div>

                <div class="form-group col-md-4">
                    {{ Form::label('term', 'Data de entrega') }}
                    {{ Form::date('term', '', ['class' => 'form-control', 'required' => '']) }}
                </div>

                <div class="form-group col-md-2">
                    {{ Form::label('value', 'Valor') }}
                    {{ Form::number('value', '', ['class' => 'form-control', 'step' => '0.1']) }}
                </div>

                <div class="form-group col-md-12">
                    {{ Form::label('pdf', 'Anexo') }}
                    <input type="file" name="pdf" accept=".pdf" class="form-control">
                </div>

                <div class="form-group col-md-12">
                    {{ Form::label('comment', 'Descrição') }}
                    {{ Form::textarea('comment', '', ['class' => 'form-control']) }}
                </div>

            <hr>
            <h5>Selecione as classes para aplicar o trabalho:</h5>
            <table class="table" style="margin-left: 5px ; padding-right: 20px">
                <thead>
                    <tr>
                        <th>Turma</th>
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
                        <td>{{$room->course->abbreviation}}</td>
                        <td>{{$room->discipline->name}}</td>
                        <td>{{$room->teacher['name']}}</td>
                        <td>
                            <div class="botao-index">
                                {{ Form::label('rooms[]', 'Vincular') }}
                                {{ Form::checkbox('rooms[]', $room->id) }}
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
