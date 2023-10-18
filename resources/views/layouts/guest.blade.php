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

    <body class="h-screen overflow-hidden">
        @include('partials.headerGuest')
        <main class = "bg-slate-300 dark:bg-slate-900 h-screen">
            <div class="w-1/2 mx-auto pt-10 px-4">
                @yield('main-content')
            </div>
        </main>
        <script src="node_modules\flowbite\dist\flowbite.min.js"></script>
    </body>
</html>
