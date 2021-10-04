@extends("layout")

@section('styles', './css/free.css')

@section('title', 'Free bee`s')

@section('main')
    <main class="free-wrapper base-size-content">
        <ul class="free" >
            @foreach($posts as $post)
            <li class="free_section">
                <div class="free_image-item">
                    <a href="{{$post->url}}"
                       target="_blank">
                        <img class="free_image" src="{{$post->image}}" alt="{{$post->name}}">
                    </a>
                </div>
                <a href="{{$post->url}}" target="_blank">
                    <button class="free_btn btn ">Herunterladen</button>
                </a>
            </li>
            @endforeach
        </ul>


    </main>
    <ul class="pagination">
        @if($posts->currentPage() != 1)
            <li><a href="?page = 1">start</a></li>
            <li><a href="{{$posts->previousPageUrl()}}">«</a></li>
        @endif
        @if($posts->count() > 1)
            @for($count = 1; $count <= $posts->lastPage(); $count++)
                @if($count > $posts->currentPage()-3 and $count < $posts->currentPage()+3)
                    <li class="@if($count==$posts->currentPage()) active @endif">
                <a href="?page={{$count}}">{{$count}}</a>
                </li>
                @endif
            @endfor
        @endif
        @if($posts->currentPage() != $posts->lastPage())
            <li><a href="{{$posts->nextPageUrl()}}">»</a></li>
            <li><a href="?page={{$posts->lastPage()}}">end</a></li>
        @endif
    </ul>
@endsection
