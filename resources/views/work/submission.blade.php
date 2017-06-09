@extends('template.template')

@section('title', 'Submeter ' . $work->title)


@section('content')
<article class="col-md-9 col-md-offset-3">
    <div class="panel panel-default" style="text-align: center;">
    <h3>Submissão de {{  $work->title }}</h3>
    <hr>
        <div class="panel-body">
        @if($term == 0)
            {!! Form::open(['url' => '/work/' . $work->id. '/submission', 'method' => 'post', 'enctype'=> 'multipart/form-data']) !!}

                <div class="row">
                    <div class="form-group col-md-12">
                        {{ Form::label('archive', 'Arquivo do trabalho') }}
                        {{ Form::file('archive', ['class' => 'form-control', 'required' => '']) }}
                    </div>

                    <div class="form-group col-md-12">
                        {{ Form::label('students', 'Estudantes do grupo:') }}
                        @foreach($students as $student)
                            <div class="form-group text-right">
                                {{ Form::label('students[]', $student->student->name) }}

                                {{ Form::checkbox('students[]', $student->student->id,  $student->student->id == auth()->user()->id) }}
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
        @else
            @if($term == 1)
                <h4>Trabalho já foi enviado!</h4>
            @else
                <h4>Tempo do trabalho já terminou!</h4>
            @endif

            <table class="table" style="margin-left: 5px ; padding-right: 20px">
                <thead>
                    <tr>
                        <th>Código de submissão</th>
                        <th>Nota</th>
                        <th>Download</th>
                    </tr>
                </thead>
                <tbody style="text-align: left;">
                    @foreach($subs as $sub)
                      <tr>
                        <td>{{$sub->protocol}}</td>
                        <td>{{$sub->value}}</td>
                        <td>
                            <div class="botao-index">
                                <a class="btn btn-xs btn-primary" href="{{ url('download/submissions!!submission-'.$sub->file.'/'.$sub->id) }}" target="_blank">
                                    <i class="glyphicon glyphicon glyphicon-down"></i> Download
                                </a>
                            </div>
                        </td>
                      </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
        </div>
    </div>
@endsection
