@extends('template.template')

@section('title', 'Professores')

@section('sidebar')
<a href="{{url('panel')}}" class="w3-button w3-padding">Voltar atrás</a>
@endsection

@section('content')
<article class="col-md-9 col-md-offset-3" style="border-left: 1px solid #eee">
    <div class="m-b-md row">
        <div class="panel panel-default col-md-10 col-md-offset-1" style="text-align: center;">
        <h3>Gerenciamento de professores</h3>
        <hr>
            <div class="panel-body">
            {!! Form::open(['url' => '/teacher/new/save', 'method' => 'post']) !!}

                <div class="row">

                    <div class="form-group col-md-12">
                        {{ Form::label('name', 'Nome completo') }}
                        {{ Form::text('name', '', ['class' => 'form-control', 'required' => '']) }}
                    </div>

                    <div class="form-group col-md-8">
                        {{ Form::label('email', 'Endereço de email') }}
                        {{ Form::text('email', '', ['class' => 'form-control', 'required' => '' ]) }}
                    </div>

                    <div class="form-group col-md-4">
                        {{ Form::label('ano', 'Ano de ingresso') }}
                        {{ Form::number('ano', '', ['class' => 'form-control', 'required']) }}
                    </div>
                        {{ Form::hidden('username', '........', ['class' => 'form-control', 'required']) }}
                        {{ Form::hidden('password', '........', ['class' => 'form-control', 'required']) }}
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
            {{ $teachers->links() }}
            <table class="table" style="margin-left: 5px ; padding-right: 20px">
                <thead>
                    <tr>
                        <th>Nome do Professor</th>
                        <th>Email</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody style="text-align: left;">
                    @foreach($teachers as $teacher)
                      <tr>
                        <td>{{$teacher->user->name}}</td>
                        <td>{{$teacher->user->email}}</td>
                        <td>
                            <div class="botao-index">
                                <button class="edit-btn"><a href="{{ url('teacher/'.$teacher->user->id.'/edit') }}"><i class="glyphicon glyphicon glyphicon-edit"></i></a></button>
                                <button class="delete-btn"><a href="{{url('teacher/'.$teacher->user->id.'/delete') }}"><i class="glyphicon glyphicon glyphicon-trash"></i></a></button>
                            </div>
                        </td>
                      </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
