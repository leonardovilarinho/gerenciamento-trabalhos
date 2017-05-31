@extends('template.template')

@section('title', 'Inicio')

@section('sidebar')
	<div class="w3-bar-block">
    <a href="admin" class="w3-button w3-padding">Administratores</a>
    <a href="{{url('/teacher/new')}}" class="w3-button w3-padding">Professores</a>
    <a href="#" class="w3-button w3-padding">Estudantes</a>
    <a href="{{url('/course/new')}}" class="w3-button w3-padding">Cursos</a>
    <a href="{{url('/discipline/new')}}" class="w3-button w3-padding">Disciplinas</a>
    <a href="{{url('include/displine/teacher')}}" class="w3-button w3-padding">Incluir Professores</a>
    
    </div>
@endsection

@section('content')
<article class="col-md-4 col-md-offset-5">

@endsection