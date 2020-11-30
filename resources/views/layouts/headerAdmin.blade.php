
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
    <div class="bod">
    <nav class="navbar navbar-light navbar-expand-md" style="background-color: #03ac0e;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#" style="color: rgba(255,255,255,0.9);">Admin</a>
            <button data-toggle="collapse" data-target="#" class="navbar-toggler"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            
        
           
            
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav">
                @guest
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="{{route('login')}}">{{__('Login')}}</a>
                    </li>
                    @if(Route::has('register'))
                    <li class="nav-item" role="presentation"><a class="nav-link" href="{{route('register')}}">{{__('Register')}}</a>
                </li>
                @endif
                @else
                <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#" style="color: #ffffff;opacity: 1;">Product</a>
                        <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="#">Add Product</a><a class="dropdown-item" role="presentation" href="#">List Product</a></div>
                    </li>
                    <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#" style="color: #ffffff;">Category&nbsp;</a>
                        <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="#">Add Category</a><a class="dropdown-item" role="presentation" href="#">List Category</a></div>
                    </li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" style="color: rgb(129,129,129);" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>

                        </div>
                    </li>
                @endguest
                </ul>
            </div>
        </div>
    </nav>
        @yield('content')
    </div>
</body>
</html>

