@extends("layout")

@section('styles', '/css/add.css')

@section('title', 'Edit')

@section('main')

        <div class="free-wrapper base-size-content" style="height: 86vh;">
            <h1 class="h1">Edit:</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li style="font-family: Mr De Haviland, cursive;
                        font-size: 24px;
                        font-weight: 700;
                        color: #56433d;
                        border-bottom: 1px solid #56433d;
                        margin-bottom: 10px;">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if(\Illuminate\Support\Facades\Auth::check())

                <form action="edit_image" method="post" enctype="multipart/form-data" class="form_inner" >
                    @csrf
                    <input type="hidden" name="id" value="{{$post->id}}" />

                    <label for="name">Edit name</label>
                    <input name="name" id="name" value="{{$post->name}}" type="text" placeholder="Username"  class="form_name"/>
                    <hr>
                    <label for="url">Edit URL</label>
                    <input name="url" id="url" value="{{$post->url}}" type="text" placeholder="URL"  class="form_name"/>
                    <hr>
                    <label for="image">Edit Image</label>
                    <input name="image" type="file"  id="image" class="file form_name">
                    <input type="submit" value="Refresh" class="btn submit"/>
                </form>

        </div>
    @endif
@endsection
