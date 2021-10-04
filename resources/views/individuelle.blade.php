@extends("layout")

@section('styles', '/css/individuelle.css')

@section('title', 'Individuelle')

@section('main')
        @if(\Illuminate\Support\Facades\Auth::check())
            <main class="base-size-content">
            <table>
                    <thead class="bg-yellow">
                    <tr>
                        <th>name</th>
                        <th>email</th>
                        <th>message</th>
                        <th>timestamp</th>
{{--                        <th>done</th>--}}
                    </tr>
                    </thead>
                    <tbody>
                    @inject('messages', "App\Models\Message")
                    @foreach($messages->show_message() as $message)
                    <tr>
                        <td>{{$message->name}}</td>
                        <td>{{$message->email}}</td>
                        <td class="bg-yellow"
                            style="font-size: 20px;
                            letter-spacing: 2px;
                            font-weight: 900;
                        ">{{$message->message}}</td>
                        <td class="bg-yellow">{{$message->created_at}}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            <ul class="pagination" style="margin: 0 auto";>
                @if($messages->show_message()->currentPage() != 1)
                    <li><a href="?page = 1">start</a></li>
                    <li><a href="{{$messages->show_message()->previousPageUrl()}}">«</a></li>
                @endif
                @if($messages->show_message()->count() > 1)
                    @for($count = 1; $count <= $messages->show_message()->lastPage(); $count++)
                        @if($count > $messages->show_message()->currentPage()-3 and $count < $messages->show_message()->currentPage()+3)
                            <li class="@if($count==$messages->show_message()->currentPage()) active @endif" >
                                <a href="?page={{$count}}">{{$count}}</a>
                            </li>
                        @endif
                    @endfor
                @endif
                @if($messages->show_message()->currentPage() != $messages->show_message()->lastPage())
                    <li><a href="{{$messages->show_message()->nextPageUrl()}}">»</a></li>
                    <li><a href="?page={{$messages->show_message()->lastPage()}}">end</a></li>
                @endif
            </ul>
    </main>
    @else
            <div class="individuelle-wrapp">
        <section>
            <p class="individuelle_text bg-yellow content-title">
                Hast ein besonderes Anliegen oder eine spezielle Anfrage über individuelle Karte oder ein anderes kreatives Produkt, dann melde dich hier gerne bei mir. Fülle das Kontaktformular aus und ich melde mich schnellstmöglich zurück.
            </p>

        </section>
        <section class="form">
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
            <form class="form_inner" action="individuelle" method="post">
                @csrf
                <label for="name">Name</label>
                <input name="name" class="form_name" id="name" type="text" placeholder="" required=""/>
                <label for="email">E-mail</label>
                <input name="email"  class="form_email" id="email" type="email" placeholder="" required=""/>
                <textarea name="message" class="form_text" required="" placeholder="Deine Anfrage... " cols="60" rows="10" ></textarea>
                <input class="btn submit"  type="submit" value="Senden" />
            </form>
        </section>
            </div>
        @endif
@endsection
