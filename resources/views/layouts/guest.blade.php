<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'BDevelopers') }}</title>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body>
        <main class = "bg-slate-300 dark:bg-slate-900 h-screen">
            @include('partials.headerGuest')
            <div class="w-1/2 mx-auto mt-10 px-4">
                @yield('main-content')
            </div>
        </main>
    </body>
</html>
