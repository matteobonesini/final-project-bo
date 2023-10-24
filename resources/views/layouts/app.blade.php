<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script src="https://unpkg.com/flowbite@1.4.4/dist/flowbite.js"></script>
        <title>{{ config('app.name', 'BDevelopers') }}</title>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/statistics.js', 'resources/js/scripts.js'])
        <script src="https://js.braintreegateway.com/web/dropin/1.40.2/js/dropin.js"></script>
        {{-- <script src="node_modules\flowbite\dist\flowbite.min.js"></script> --}}
        
    </head>

    <body>
        <div class="flex flex-col h-screen ">
            <div class="min-h-[10%]">
                @include('partials.header')
            </div>

            <div class="flex min-h-[90%] bg-gray-300 bg-opacity-50 bg-blend-color-dodge dark:bg-blend-multiply bg-black-pattern dark:bg-green-400">
    
                @include('partials.aside')
    
                @yield('main-content')

            </div>
        </div>
    </body>
</html>
