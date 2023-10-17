<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'BDevelopers') }}</title>

        <!-- Fonts -->

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        
    </head>

    <body>
        <div class="flex flex-col h-screen">
            <div class="h-[8%]">
                @include('partials.header')
            </div>

            <div class="flex h-[92%]">
    
                @include('partials.aside')
    
                @yield('main-content')

            </div>
        </div>
        <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
    </body>
</html>
