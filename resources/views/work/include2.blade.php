@extends('template.template')

@section('title', 'Pt2. Criar trabalho a disciplina')

@section('sidebar')
<a href="{{url('include/work')}}" class="w3-button w3-padding">Voltar atrás</a>

@endsection

@section('content')
<article class="col-md-9 col-md-offset-3" style="border-left: 1px solid #eee">
    <div class="m-b-md row">
        <div class="panel panel-default col-md-10 col-md-offset-1" style="text-align: center;">
        <h3>Incluir Trabalho</h3>
        <h4>Curso: {{ $course->name }}</h4>

            <div class="panel-body">
            {!! Form::open(['url' => 'include/work/end', 'method' => 'post', 'enctype'=> 'multipart/form-data']) !!}
				{{Form::hidden('course_id', $course->id)}}
                
                <div class="form-group col-md-6">
                    {{ Form::label('title', 'Nome do trabalho') }}
                    {{ Form::text('title', '', ['class' => 'form-control', 'required' => '']) }}
                </div>
                <div class="form-group col-md-6">
                    {{ Form::label('discipline_id', 'Selecione uma matéria') }}
                    {{ Form::select('discipline_id', $disciplines, null, ['class' => 'form-control']) }}
                </div>

                <div class="form-group col-md-4">
                    {{ Form::label('term', 'Data de entrega') }}
                    {{ Form::date('term', '', ['class' => 'form-control', 'required' => '']) }}
                </div>

                <div class="form-group col-md-4">
                    {{ Form::label('value', 'Valor') }}
                    {{ Form::number('value', '', ['class' => 'form-control', 'step' => '0.1']) }}
                </div>

                <div class="form-group col-md-4">
                    {{ Form::label('pdf', 'Anexo') }}
                    <input type="file" name="pdf" accept=".pdf" class="form-control">
                </div>

                <div class="form-group col-md-12">
                    {{ Form::label('comment', 'Descrição') }}
                    {{ Form::textarea('comment', '', ['class' => 'form-control']) }}
                </div>



                <hr>
                <div class="row">
                    <div class="col-md-8 text-danger">
                    @if(isset($erro))
                        {{$erro}}
                    @endif

                    @if(isset($errors))
                        {{$errors->first()}}
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
                        {{  Form::submit('Criar trabalho', ['class' => 'btn btn-default']) }}
                    </div>
                </div>
            {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
