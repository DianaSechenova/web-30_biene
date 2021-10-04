@extends("layout")

@section('styles', '/css/admin.css')

@section('title', 'Admin')

@section('main')
    @if(\Illuminate\Support\Facades\Auth::check())
        <main  class="base-size-content admin">
            <section class="btn admin-btn _a">
                <a href="{{route('add_image_get')}}">add new picture</a>
            </section>
            <table>
                <thead class=" bg-yellow">
                <tr>
                    <th>id</th>
                    <th>image</th>
                    <th>alt</th>
                    <th>url</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>

                    @foreach($posts as $post)
                        <tr>
                        <td>{{$post->id}}</td>
                        <td><img src="{{$post->image}}" alt="{{$post->name}}" ></td>
                        <td class="admin-text">{{$post->name}}</td>
                        <td><a class="admin-text" href="{{$post->url}}" target="_blank">Follow the link</a></td>
                        <td>
                            <form action="/admin/edit_image/{{$post->id}}" method="get">
                                <input type="hidden" name="id" value="{{$post->id}}">
                                <button type="submit" class="btn admin-btn">edit</button>
                            </form>
                        </td>
                        <td>
                            <form action="" method="post">
                                {{csrf_field()}}
                                {{method_field('delete')}}
                                <input type="hidden" name="id" value="{{$post->id}}">
                                <button type="submit" class="btn admin-btn">delete</button>
                            </form>
                        </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </main>
        <ul class="pagination">
            @if($posts->currentPage() != 1)
                <li><a href="?page = 1">start</a></li>
                <li><a href="{{$posts->previousPageUrl()}}">«</a></li>
            @endif
            @if($posts->count() > 1)
                @for($count = 1; $count <= $posts->lastPage(); $count++)
                    @if($count > $posts->currentPage()-3 and $count < $posts->currentPage()+3)
                        <li class="@if($count==$posts->currentPage()) active @endif" >
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
    @endif

@endsection

