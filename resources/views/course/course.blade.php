@extends('template.template')

@section('title', 'Entrar no sistema')

@section('sidebar')

@endsection

@section('content')
<article class="col-md-6 col-md-offset-3" style="border-left: 1px solid #eee">
    <div class="m-b-md row">
        <div class="panel panel-default col-md-10 col-md-offset-1" style="text-align: center;">
        <h3>Cadastro de curso</h3>
        <hr>
            <div class="panel-body">
            {!! Form::open(['url' => '/course/new', 'method' => 'post']) !!}

                <div class="form-group">
                    {{ Form::label('name', 'Nome do curso') }}
                    {{ Form::text('name', '', ['class' => 'form-control', 'required']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('abbreviation', 'Abreviação do curso') }}
                    {{ Form::text('abbreviation', '', ['class' => 'form-control', 'required']) }}
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

                    <div class="col-md-4 text-right">
                        {{  Form::submit('Cadastrar', ['class' => 'btn btn-default']) }}
                    </div>
                </div>
            {!! Form::close() !!}
            </div>

            <table class="table" style="margin-left: 5px ; padding-right: 20px">
                <thead>
                    <tr>
                        <th>Nome do curso</th>
                        <th>Abreviação</th>
                    </tr>
                </thead>
                <tbody style="text-align: left;">
                    @foreach($courses as $course)
                      <tr>
                        <td>{{$course->name}}</td>
                        <td>{{$course->abbreviation}}</td>
                        <td>
                            <div class="botao-index">
                                <button class="edit-btn"><a href="{{ url('course/'.$course->id.'/edit') }}"><i class="glyphicon glyphicon glyphicon-edit"></i></a></button>
                                <button class="delete-btn"><a href="{{url('course/'.$course->id.'/delete') }}"><i class="glyphicon glyphicon glyphicon-trash"></i></a></button>
                            </div>
                        </td>
                      </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
