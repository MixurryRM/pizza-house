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

    @vite(['resources/sass/app.scss', 'public/main.css', 'resources/js/app.js'])
</head>

<body>
    <ul class="nav justify-content-end pt-3 me-5">
        @auth
            <li class="nav-item">
                <a class="nav-link active pizza-color" href="/">Home</a>
            </li>
            <li class="nav-item">
                <form class="inline" action="auth/logout" method="POST">
                    @csrf
                    <button type="submit" class="btn w-100 text-light" style="background-color: #5e2195">
                        Logout
                    </button>
                </form>
            </li>
        @else
            <li class="nav-item">
                <a class="nav-link pizza-color" href="{{ url('auth/login') }}">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link pizza-color" href="{{ url('auth/register') }}">Register</a>
            </li>
        @endauth
    </ul>
    @yield('content')

    <footer>
        <p>Copyright &copy; 2022, All Rights reserved</p>
    </footer>
</body>

</html>
