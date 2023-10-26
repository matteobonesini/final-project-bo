<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script src="https://unpkg.com/flowbite@1.4.4/dist/flowbite.js"></script>
        <title>{{ config('app.name', 'BDeveloper') }}</title>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/statistics.js', 'resources/js/scripts.js'])
        <script src="https://js.braintreegateway.com/web/dropin/1.40.2/js/dropin.js"></script>
        
    </head>

    <body>
        <div class="flex flex-col h-screen box-border">
            <header class="md:h-[74px]">
                @include('partials.header')
            </header>

            <main class="flex h-[calc(100vh_-_74px)] bg-gray-300 bg-opacity-50 bg-blend-color-dodge dark:bg-blend-multiply bg-black-pattern dark:bg-green-400">
    
                @include('partials.aside')
    
                <div class="w-full h-full">
                    <div class="text-xl h-[--sponsorship-banner-height-mobile] md:h-[--sponsorship-banner-height] text-center">
                        @if (isset($developer) && $developer->active_sponsorship)
                            <a href="{{ route('sponsorship') }}">
                                <div class="bg-amber-300 text-yellow-800 font-medium h-full text-sm md:text-xl leading-10 md:leading-10">Sponsorizzazione attiva
                                    &rarr; <span id="expire_date" class="ms-1"></span>
                                </div>
                                @php
                                    date_default_timezone_set('Europe/Rome');
                                    $date = strtotime($developer->sponsorship_expire_date);
                                @endphp
                                <script>
                                    const d = new Date({{ $date * 1000 }});
                                    let day = d.toLocaleString('it-IT', {day: 'numeric', month: 'numeric', year:'numeric'})
                                    let hour = d.toLocaleString('it-IT', {hour12: false, hour:'2-digit', minute:'numeric'})
                                    expire = 'Scadenza il giorno ' + day + ' alle ore ' + hour;
                                    document.getElementById("expire_date").innerHTML = expire
                                </script>
                            </a>
                        @else
                            <a href="{{ route('sponsorship') }}">
                                <div class="bg-zinc-900 text-white dark:text-black dark:bg-zinc-100 font-medium h-full text-sm md:text-xl leading-10 md:leading-10">Scopri i vantaggi della sponsorizzazione
                                    &rarr; <span class="ms-1 text-yellow-500 font-bold">Attiva ora!</span>
                                </div>
                            </a>
                        @endif
                    </div>

                    <div class="h-[calc(100%_-_var(--sponsorship-banner-height-mobile))] md:h-[calc(100%_-_var(--sponsorship-banner-height))]">
                        @yield('main-content')
                    </div>
                    
                </div>

            </main>
        </div>
    </body>
</html>
