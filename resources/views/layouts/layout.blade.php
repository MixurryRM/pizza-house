<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <script src="//unpkg.com/alpinejs" defer></script>

    <!-- Bootstrap CSS-->
    <link href="{{ asset('admin/vendor/bootstrap-4.1/bootstrap.min.css') }}" rel="stylesheet" media="all">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="/css/main.css">

    {{-- fontawesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <ul class="nav justify-content-end pt-3 me-5">
        @auth
            @if (auth()->user()->role === 'user')
                <li class="nav-item mt-2 me-5">
                    <a class="pizza-color text-decoration-none" href="/"><i class="fa-solid fa-house"></i></a>
                </li>
                <li class="nav-item mt-2 me-5">
                    <a class="pizza-color text-decoration-none" href="{{ route('reviews.index') }}"><i
                            class="fa-solid fa-headset"></i></a>
                </li>
                <li class="nav-item mt-2 me-5">
                    <a class="pizza-color text-decoration-none" href="#">{{ Auth::user()->name }}</a>
                </li>
                <li class="nav-item">
                    <form class="inline" action="{{ route('auth.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn w-100 text-light" style="background-color: #5e2195">
                            Logout
                        </button>
                    </form>
                </li>
            @elseif(auth()->user()->role === 'staff')
                <li class="nav-item mt-2 me-5">
                    <a class="pizza-color text-decoration-none" href="/"><i class="fa-solid fa-house"></i></a>
                </li>
                <li class="nav-item mt-2 me-5">
                    <a href="{{ route('users.pizzaIndex') }}" class="pizza-color text-decoration-none"><i
                            class="fa-solid fa-check-to-slot"></i></a>
                </li>
                <li class="nav-item mt-2 me-5">
                    <a class="pizza-color text-decoration-none" href="#">{{ Auth::user()->name }}</a>
                </li>
                <li class="nav-item">
                    <form class="inline" action="{{ route('auth.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn w-100 text-light" style="background-color: #5e2195">
                            Logout
                        </button>
                    </form>
                </li>
            @else
                <li class="nav-item mt-2 me-5">
                    <a class="pizza-color text-decoration-none" href="/"><i class="fa-solid fa-house"></i></a>
                </li>
                <li class="nav-item mt-2 me-5">
                    <a href="{{ route('users.pizzaIndex') }}" class="pizza-color text-decoration-none"><i
                            class="fa-solid fa-check-to-slot"></i></a>
                </li>
                <li class="nav-item mt-2 me-5">
                    <a href="{{ route('users.index') }}" class="pizza-color text-decoration-none"><i
                            class="fa-solid fa-users"></i></a>
                </li>
                <li class="nav-item mt-2 me-5">
                    <a class="pizza-color text-decoration-none" href="{{ route('reviews.list') }}"><i
                            class="fa-solid fa-headset"></i></a>
                </li>
                <li class="nav-item mt-2 me-5">
                    <a class="pizza-color text-decoration-none" href="#">{{ Auth::user()->name }}</a>
                </li>
                <li class="nav-item">
                    <form class="inline" action="{{ route('auth.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn w-100 text-light" style="background-color: #5e2195">
                            Logout
                        </button>
                    </form>
                </li>
            @endif
        @else
            <li class="nav-item mt-2 me-4">
                <a class="pizza-color" href="{{ route('auth.login') }}">Login</a>
            </li>
            <li class="nav-item mt-2 me-4">
                <a class="pizza-color" href="{{ route('auth.register') }}">Register</a>
            </li>
        @endauth
    </ul>
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path
                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
        </symbol>
        <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
            <path
                d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
        </symbol>
        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path
                d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
        </symbol>
    </svg>

    @yield('content')

    <footer>
        <p>Copyright &copy; 2024, All Rights Reserved By Mixurry RM</p>
    </footer>

    {{-- jquery cdn link --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

</body>
@yield('scriptSource')

</html>
