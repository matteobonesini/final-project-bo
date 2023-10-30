<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script src="https://unpkg.com/flowbite@1.4.4/dist/flowbite.js"></script>

        <title>{{ config('app.name', 'BDeveloper') }}</title>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="h-screen overflow-hidden">
        @include('partials.headerGuest')
        <main class="h-screen">
            <div class="w-full md:w-3/4 lg:w-4/6 mx-auto py-4 md:pt-10 px-4">
                @yield('main-content')
            </div>
        </main>
    </body>
</html>
