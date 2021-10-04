@extends("layout")

@section('styles', './css/main.css')

@section('title', 'Biene')

@section('main')
    <main  class="main">
        <div class="kreativ">
            <span class="kreativ_text">kreativ</span>
            <span class="kreativ_text shadow" >durch dein</span>
            <span class="kreativ_text">leben</span>
        </div>
        <div class="actuall-wrapp">
            <div class="actuall">
                <div class="actuall_title-wrapp">
                    <span class="actuall_title shadow">aktuell</span>
                </div>
                <div class="actuall_list-wrapp bg-yellow">
                    <ul class="list actuall_list">
                        @foreach($posts as $post)
                        <li class="actuall_list__item">
                           <a href="{{$post->url}}" target="_blank"><img src="{{$post->image}}" alt="{{$post->name}}"></a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </main>
@endsection
