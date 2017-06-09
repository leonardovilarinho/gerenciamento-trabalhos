@extends('template.template')

@section('title', 'Trabalhos')

@section('content')
<article class="col-md-9 col-md-offset-3" style="border-left: 1px solid #eee">

    @foreach ($room->works as $work)
        <a href="{{ url('work/'.$work->id.'/submission') }}">
            <div class="w3-row-padding w3-margin-bottom">
                <div class="w3-quarter">
                    <div class="w3-container w3-red w3-padding-16">
                        <div class="w3-left">
                            <i class="w3-xxxlarge">{{ $work->id }}</i>
                        </div>
                        <div class="w3-right">
                            <h3>...</h3>
                        </div>
                        <div class="w3-clear"></div>
                        <h4>{{ $work->title }}</h4>
                    </div>
                </div>
            </div>
        </a>
    @endforeach

</article>
@endsection