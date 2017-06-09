@extends('template.template')

@section('title', 'Administradores')


@section('content')
<article class="col-md-9 col-md-offset-3">
    <br>
    <div class="panel panel-default" style="text-align: center;">
    <h3>Gerenciamento de administradores</h3>
    <hr>
      <div class="panel-body">
       {!! Form::open(['url' => 'admin/save', 'method' => 'post']) !!}

                <h4 class="text-left">Sobre o administrador:</h4>

                <div class="form-group">
                    {{ Form::label('email', 'Endereço de email') }}
                    {{ Form::text('email', '', ['class' => 'form-control', 'required']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('name', 'Nome completo') }}
                    {{ Form::text('name', '', ['class' => 'form-control', 'required']) }}
                </div>

                <div class="form-group row">

                    <div class="col-md-6">
                        {{ Form::label('username', 'Usuário') }}
                        {{ Form::text('username', '',  ['class' => 'form-control', 'required']) }}
                    </div>

                    <div class="col-md-6">
                        {{ Form::label('password', 'Senha') }}
                        {{ Form::password('password', ['class' => 'form-control']) }}
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-8 text-danger">
                        {{$errors->first()}}
                    </div>
                </div>
                <div style="text-align: center;">
                    {{  Form::submit('Cadastrar', ['class' => 'btn btn-default']) }}
                </div>
            {!! Form::close() !!}
        <br>
        <div class="row">
            {{ $managers->links() }}
            <table class="table" style="margin-left: 5px ; padding-right: 20px">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Usuário</th>
                        <th>Email</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody style="text-align: left;">
                    @foreach($managers as $manager)
                      <tr>
                        <td>{{$manager->user->name}}</td>
                        <td>{{$manager->user->username}}</td>
                        <td>{{$manager->user->email}}</td>
                        <td>
                            <div class="botao-index">
                                <a class="btn btn-xs btn-primary" href="{{ url('admin/'.$manager->user->id.'/edit') }}">
                                    <i class="glyphicon glyphicon glyphicon-edit"></i> Editar
                                </a>

                                @if($manager->user->id != 1)
                                    <a class="btn btn-xs btn-danger" href="{{ url('admin/'.$manager->user->id.'/delete') }}">
                                        <i class="glyphicon glyphicon glyphicon-trash"></i> Apagar
                                    </a>
                                @endif
                            </div>
                        </td>
                      </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection