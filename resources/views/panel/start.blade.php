@extends('template.template')

@section('title', 'Inicio')

@section('sidebar')
	<div class="w3-bar-block">
    <a href="admin" class="w3-button w3-padding">Administrator</a>
    <a href="#" class="w3-button w3-padding">Teacher</a>
    <a href="#" class="w3-button w3-padding">Student</a>
    <a href="{{url('/course/new')}}" class="w3-button w3-padding">Course</a>
    </div>
@endsection

@section('content')
<article class="col-md-4 col-md-offset-5">

@endsection