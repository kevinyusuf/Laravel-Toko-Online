<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="navBar">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#"><img src="{{asset('img/logo.png')}}" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                @guest
                    <li class="nav-item">
                        <a href="{{route('login')}}" class="nav-link">{{__('Login')}}</a>
                    </li>
                    @if(Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('register')}}">{{__('Register')}}</a>
                    </li>    
                    @endif
                @endguest
                </ul>
            </div>
        </nav>
        @yield('content');
    </div>
</body>
</html>