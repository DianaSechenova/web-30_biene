@extends("layout")

@section('styles', '/css/add.css')

@section('title', 'Add')

@section('main')
    <div class="base-size-content" style="height: 86vh;">
        <h1 class="h1">add new picture:</h1>
        @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li style="font-family: Mr De Haviland, cursive;
                        font-size: 24px;
                        font-weight: 700;
                        color: #56433d;
                        border-bottom: 1px solid #56433d;
                        margin-bottom: 10px;" class="tip">{{ $error }}</li>
                    @endforeach
                </ul>
        @endif
        @if(\Illuminate\Support\Facades\Auth::check())

            <form action="add_image" method="post" enctype="multipart/form-data" class="bg-yellow add-form" >
                @csrf
                <label for="name">Add name</label>
                <input name="name" id="name" type="text" placeholder="Username"/>
                <hr>
                <label for="url">Add URL</label>
                <input name="url" id="url" type="text" placeholder="URL"/>
                <hr>
                <label for="image">Add Image</label>
                <input name="image" type="file"  id="image" class="file form_name">
                <input type="submit" value="save" class="btn submit"/>
            </form>
        @endif
    </div>

@endsection
