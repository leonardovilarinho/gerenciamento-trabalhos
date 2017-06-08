@extends('template.template')

@section('title', 'Vincular estudante a disciplina')

@section('sidebar')
<a href="{{url('panel')}}" class="w3-button w3-padding">Voltar atrás</a>

@endsection

@section('content')
<article class="col-md-9 col-md-offset-3" style="border-left: 1px solid #eee">
    <div class="m-b-md row">
        <div class="panel panel-default col-md-10 col-md-offset-1" style="text-align: center;">
        <h3>Incluir Estudante</h3>
        <hr>
            <div class="panel-body">
            {!! Form::open(['url' => 'include/displine/student/pt1', 'method' => 'post']) !!}

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
                        {{  Form::submit('Próximo >>', ['class' => 'btn btn-default']) }}
                    </div>
                </div>
            {!! Form::close() !!}

            <table class="table" style="margin-left: 5px ; padding-right: 20px">
                <thead>
                    <tr>
                        <th>Estudante</th>
                        <th>Curso</th>
                        <th>Matéria</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody style="text-align: left;">
                    @foreach($links as $link)
                      <tr>
                        <td>{{$link['student']}}</td>
                        <td>{{$link['course']}}</td>
                        <td>{{$link['discipline']}}</td>
                        <td>
                            <div class="botao-index">
                                <button class="delete-btn"><a href="{{url('include/displine/student/'.$link['course_id'].'/'.$link['discipline_id'].'/'.$link['student_id']) }}"><i class="glyphicon glyphicon glyphicon-trash"></i></a></button>
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
