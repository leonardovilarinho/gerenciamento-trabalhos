@extends('template.template')

@section('title', 'Inicio')

@section('sidebar')
	<div class="w3-bar-block">
	@if(auth()->user()->manager)
	    <a href="{{url('/admin')}}" class="w3-button w3-padding">Administratores</a>
	    <a href="{{url('/teacher/new')}}" class="w3-button w3-padding">Professores</a>
    @endif

    @if(auth()->user()->manager or auth()->user()->teacher)
    	<a href="{{url('/student/new')}}" class="w3-button w3-padding">Estudantes</a>
    @endif

    @if(auth()->user()->manager)
	    <a href="{{url('/course/new')}}" class="w3-button w3-padding">Cursos</a>
	    <a href="{{url('/discipline/new')}}" class="w3-button w3-padding">Disciplinas</a>
	    <a href="{{url('include/displine/teacher')}}" class="w3-button w3-padding">Professor X Disciplina</a>
    @endif

	@if(auth()->user()->teacher)
	    <a href="{{url('/include/work')}}" class="w3-button w3-padding">Trabalhos</a>
    @endif

    </div>
@endsection

@section('content')
<article class="col-md-4 col-md-offset-5">

@endsection