<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="@yield('styles')">
    <title>@yield('title')</title>
</head>

<body>
{{--/////////////--Header--}}
<header class="header">
    <div class="header_body">
        <a href="{{route('index')}}" class="header_logo">
            <img src="./images/biene.png" alt="Logo">
        </a>
        <div class="header_burger">
            <span></span>
        </div>
        <nav class="header_menu">
            <ul class="header_list">
                <li class="links">
                    <a href="{{route('free')}}" class="header_link">Free bee`s</a>
                </li>
                <li class="links">
                    <a href="{{route('about')}}" class="header_link cursive">About Me</a>
                </li>
                <li class="links">
                    <a href="{{route('form')}}" class="header_link _link">individuelle bestellungen</a>
                </li>
                @if(\Illuminate\Support\Facades\Auth::check())
                    <li class="links">
                        <a href="{{route('admin_image_get')}}" class="header_link cursive">Admin</a>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
</header>
{{------------------main content--}}
@yield('main')
{{--/////////////--footer--}}
<footer class="footer">
    <div class="info">
        <a href="#"  class="shadow">info`s</a>
    </div>
    <div class="links">
        @inject('contacts', "App\Models\Contact")

        @foreach($contacts->show_contact() as $contact)
            <a href="{{$contact->link}}" class="wrapp-circle" target="_blank">{{$contact->title}}</a>
        @endforeach

    </div>
</footer>
<script src="./js/header.js"></script>
</body>
</html>
