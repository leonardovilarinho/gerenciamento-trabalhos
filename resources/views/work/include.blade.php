@extends('template.template')

@section('title', 'Gerenciar trabalhos')

@section('sidebar')
<a href="{{url('panel')}}" class="w3-button w3-padding">Voltar atrás</a>

@endsection

@section('content')
<article class="col-md-9 col-md-offset-3" style="border-left: 1px solid #eee">
    <div class="m-b-md row">
        <div class="panel panel-default col-md-10 col-md-offset-1" style="text-align: center;">
        <h3>Gerenciar trabalhos</h3>
        <hr>
            <div class="panel-body">
            {!! Form::open(['url' => 'include/work/pt1', 'method' => 'post']) !!}

                <div class="form-group text-right">
                    {{ Form::label('course', 'Selecione um curso') }}
                    {{ Form::select('course', $courses, null, ['class' => 'form-control']) }}
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

                    <div class="col-md-8 text-success">
                    @if(session('msg'))
                        {{ session('msg') }}
                    @endif
                    </div>

                    <div class="col-md-12 text-right">
                        {{  Form::submit('Continuar criação >>', ['class' => 'btn btn-default']) }}
                    </div>
                </div>
            {!! Form::close() !!}

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
                    @foreach($works as $work)
                      <tr>
                        <td>{{$work->title}}</td>
                        <td>{{$work->value}}</td>
                        <td>{{date('d/m/Y', strtotime($work->term))}}</td>
                        <td>{{$work->course->name}}</td>
                        <td>
                            <a href="{{url('download/works!!work-'.$work->id.'.pdf')}}">Download</a>
                        </td>
                        <td>
                            <div class="botao-index">
                                <button class="delete-btn"><a href="{{url('include/work/'.$work->id) }}"><i class="glyphicon glyphicon glyphicon-trash"></i></a></button>
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
