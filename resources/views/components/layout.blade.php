<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
    </head>
    <body class="bg-gradient-to-r from-teal-200 to-green-400 text-black">
        <header class="w-full bg-white shadow-lg p-6 lg:p-8 flex items-center justify-between px-6 py-4 ">
            <a href="/" class="place-content-start">{{ config('app.name', 'Laravel') }}</a>
            @if (Route::has('login'))
                <nav class="flex items-center gap-4">
                    @auth
                        <a
                            href="{{ route('home') }}"
                            class=""
                        >
                            Home
                        </a>
                    @else
                        <a
                            href="{{ route('login') }}"
                            class=""
                        >
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a
                                href="{{ route('register') }}"
                                class="">
                                Register
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
        </header>
        {{ $slot }}

        @if (Route::has('login'))
            <div class=""></div>
        @endif
    </body>
</html>
