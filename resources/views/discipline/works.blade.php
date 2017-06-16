@extends('template.template')

@section('title', 'Trabalhos')

@section('content')
<article class="col-md-9 col-md-offset-3" style="border-left: 1px solid #eee">
<h2>Trabalhos de {{ $discipline->name }}</h2>
    <div class="w3-row-padding w3-margin-bottom">
        @foreach ($room->works as $key => $work)
            <a href="{{ url('work/'.$work->id.'/submission') }}">
                <div class="w3-quarter">
                    @if(($key + 1) % 2 == 0)
                        <div class="w3-container w3-red w3-padding-16">
                    @elseif(($key + 1) % 3 == 0)
                        <div class="w3-container w3-blue w3-padding-16">
                    @else
                        <div class="w3-container w3-green w3-padding-16">
                    @endif
                        <div class="w3-left">
                            <i class="w3-xxxlarge glyphicon glyphicon-paperclip"></i>
                        </div>
                        <div class="w3-right">
                            <h3>...</h3>
                        </div>
                        <div class="w3-clear"></div>
                        <h4>{{ $work->title }}</h4>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</article>
@endsection