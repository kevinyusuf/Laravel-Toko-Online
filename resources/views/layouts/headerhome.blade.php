

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
    <nav class="navbar navbar-light navbar-expand-md" style="padding: 10px 16px;">
        <div class="container-fluid"><button data-toggle="collapse" data-target="#" class="navbar-toggler"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse"><a class="navbar-brand ml-auto" href="{{url('/')}}    "><img src="{{asset('img/logo.png')}}" alt=""></a>
                <form class="form-inline ml-auto" target="_self">
                    <div class="form-group"><label for="search-field"></label><input class="form-control search-field" type="search" id="search-field" name="search"  placeholder="Search" style="width: 410px;"></div>
                </form>
            </div><a class="btn btn-success text-white" role="button" style="margin: 0px 20px;">Search</a>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav text-right mx-auto">
                @guest
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="{{route('login')}}">{{__('Login')}}</a>
                    </li>
                    @if(Route::has('register'))
                    <li class="nav-item" role="presentation"><a class="nav-link" href="{{route('register')}}">{{__('Register')}}</a>
                </li>
                @endif
                @else
                <li class="nav-item" role="presentation" style="margin-right: 5px;"><a
                            class="nav-link active d-lg-flex d-xl-flex align-items-lg-center justify-content-xl-center align-items-xl-center"
                            href="#"><img class="img-fluid d-xl-flex justify-content-xl-center align-items-xl-center"
                                src="{{ asset('img/shopping-cart.png')}}" style="width: 30px;"></a>
                    </li>
                    <li class="nav-item" role="presentation" style="margin-right: 5px;"><a
                            class="btn btn-success text-white"
                            href="#" role="button">History</a>
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