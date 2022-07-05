<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
<body>
    <div id="app">
            <div class="container mt-3">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('/img/Black.png') }}" alt="" width="180">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                            @if (Route::has('login'))
                                <li class="">
                                    <a class="" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif  

                    </ul>
                </div>
            </div>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="{{ asset('/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
