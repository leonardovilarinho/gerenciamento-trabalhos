@extends('template.template')

@section('title', 'Gerenciar trabalhos')

@section('sidebar')
<a href="{{url('panel')}}" class="w3-button w3-padding">Voltar atrás</a>

@endsection

@section('content')
<article class="col-md-9 col-md-offset-3" style="border-left: 1px solid #eee">
    <a class="btn btn-default" href="{{ url('work/new') }}">
        Criar um novo trabalho
    </a>
    <br>
    <div class="panel panel-default" style="text-align: center;">
    <h3>Gerenciar trabalhos</h3>
    <hr>
        <div class="panel-body">
        <table class="table" style="margin-left: 5px ; padding-right: 20px">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Nota</th>
                    <th>Data</th>
                    <th>Curso</th>
                    <th>PDF</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody style="text-align: left;">
                @foreach($rooms as $room)
                    @foreach ($room->works as $work)
                        <tr>
                            <td>{{$work['title']}}</td>
                            <td>{{$work['value']}}</td>
                            <td>{{date('d/m/Y', strtotime($work['term']))}}</td>
                            <td>{{$work['room']['course']['abbreviation']}}</td>
                            <td>
                            <a href="{{url('download/works!!work-'.$work['id'].'.pdf')}}">Download</a>
                            </td>
                            <td>
                            <div class="botao-index">
                                <a class="btn btn-xs btn-danger" href="{{url('work/'.$work['id'].'/delete') }}">
                                    <i class="glyphicon glyphicon glyphicon-trash"></i> Apagar
                                </a>
                            </div>
                            </td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
@endsection
