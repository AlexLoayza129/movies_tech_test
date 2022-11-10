<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'App Santa Clara') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- CSRF TOKEN -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @routes
</head>
<body>
    <div id="app" class="container-fluid mx-auto min-h-screen bg-gray-900">
        <header class="flex justify-between items-center p-4 bg-black">
            <h1 class="text-red-600 text-2xl">{{ config('app.name', 'App Santa clara')}}</h1>
            <!-- Right Side Of Navbar -->
            <ul class="flex items-center space-x-4">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li>
                            <a class="text-white hover:py-2 hover:border-b-2 hover:border-red-600 transition-all ease-in-out duration-500 hover:text-red-600" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif
                @else
                    <li>
                        <a class="text-white hover:py-2 hover:border-b-2 hover:border-red-600 transition-all ease-in-out duration-500 hover:text-red-600" href="{{ route('admin.movies.index') }}">Peliculas</a>
                    </li>
                    <li class="flex items-center space-x-4 relative ">
                        <a id="user_profile_btn" class="text-white flex items-center space-x-1" href="#" role="button">
                            <svg class="fill-white w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0S96 57.3 96 128s57.3 128 128 128zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg>
                            <span>{{ Auth::user()->name }}</span>
                        </a>
                        <div id="logout_box" class="hidden  absolute bg-white right-2 top-10 py-4 px-8 hover:bg-gray-300">
                            <a class="" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </header>
        <main class="flex justify-center  items-center min-h-[90vh] ">
            @yield('content')
        </main>
        <footer class="bg-black p-4">
            <h3 class="text-center text-white mb-2">Página hecha con motivos prácticos y evaluativos todos los derechos reservados para el desarrollador</h3><span></span>
            <hr class="border-b-2 border-gray-600">
            <h3 class="text-center text-white mt-2">Aloayza Developer 2022 - Software Developer</h3>
        </footer>
    </div>
</body>
</html>
