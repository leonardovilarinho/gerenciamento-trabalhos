@extends('template.template')

@section('title', 'Administradores')

@section('sidebar')
    <a href="{{url('admin/new')}}" class="w3-button w3-padding">Criar novo</a>
    <a href="{{url('panel')}}" class="w3-button w3-padding">Voltar</a>
@endsection

@section('content')
<article class="col-md-9 col-md-offset-3">
    <div class="panel panel-default">
      <div class="panel-body">
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
                                <button class="edit-btn"><a href="{{ url('admin/'.$manager->user->id.'/edit') }}"><i class="glyphicon glyphicon glyphicon-edit"></i></a></button>
                                @if($manager->user->id != 1)
                                 <button class="delete-btn"><a href="{{ url('admin/'.$manager->user->id.'/delete') }}"><i class="glyphicon glyphicon glyphicon-trash"></i></a></button>
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