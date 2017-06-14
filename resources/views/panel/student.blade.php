@extends('template.template')

@section('title', 'Inicio')

@section('sidebar')
	<div class="w3-bar-block">
    </div>
@endsection

@section('content')

<article class="col-md-9 col-md-offset-3" style="border-left: 1px solid #eee">
<h2>Meus cursos</h2>
	@foreach ($rooms_student as $link)
		<a href="{{ url('course/'.$link->room->course->id.'/disciplines') }}">
		    <div class="w3-row-padding w3-margin-bottom">
			    <div class="w3-quarter">
				    <div class="w3-container w3-red w3-padding-16">
				    	<div class="w3-left">
				    		<i class="w3-xxxlarge">{{ $link->room->course->abbreviation }}</i>
				    	</div>
					    <div class="w3-right">
					        <h3>...</h3>
					    </div>
				    	<div class="w3-clear"></div>
				        <h4>{{ $link->room->course->name }}</h4>
				    </div>
			  	</div>
			</div>
		</a>
	@endforeach

</article>
@endsection