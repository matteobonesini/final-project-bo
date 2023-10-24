@extends('layouts.app')

@section('main-content')
    <main class="bg-zinc-50 dark:bg-zinc-900 w-full overflow-auto text-black dark:text-white">
        <div class="container mx-auto my-16 px-4">
            <div class="sm:w-full mx-auto flex flex-col items-center md:justify-start md:flex-row gap-2 mb-10">
                {{-- Profile Picture --}}
                @if (isset($developer->profile_picture))
                    <img class="mb-5 md:mb-0 me-0 md:me-10 rounded-lg w-48 object-cover" src="{{ $developer->full_img_src }}" alt="{{ $developer->user->name }}">
                @else
                    <img class="mb-5 md:mb-0 me-0 md:me-10 rounded-lg w-48 object-cover" src="https://placehold.co/600x600/1dbf73/FFF/?text={{ $developer->user->name }}" alt="{{ $developer->user->name }}">
                @endif
                <div class="text-center md:text-start">
                    {{-- Developer Name --}}
                    <h2 class="text-4xl font-bold">{{ $developer->user->name }}</h2>
                    {{-- Developer Average Vote --}}
                    <div class="flex justify-center md:justify-start mt-3 mb-5">
                        @for ($j=0; $j < $avgVote; $j++)
                            <div class=" text-yellow-600 dark:text-yellow-400 mr-1 w-3.5 flex-none">
                                <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5.68021 0.92574C6.31574 -0.00157559 7.68426 -0.00157684 8.31979 0.925739L9.49972 2.6474C9.70777 2.95097 10.0141 3.17354 10.3671 3.27759L12.3691 3.86775C13.4474 4.18562 13.8703 5.48717 13.1848 6.37815L11.912 8.03235C11.6876 8.32402 11.5706 8.68415 11.5807 9.05203L11.6381 11.1384C11.669 12.2622 10.5618 13.0666 9.50263 12.6899L7.53608 11.9906C7.18933 11.8673 6.81067 11.8673 6.46392 11.9906L4.49738 12.6899C3.43816 13.0666 2.331 12.2622 2.3619 11.1384L2.41929 9.05203C2.4294 8.68415 2.31239 8.32402 2.08797 8.03235L0.815197 6.37815C0.129656 5.48717 0.552554 4.18562 1.63087 3.86775L3.63289 3.27759C3.98589 3.17354 4.29223 2.95097 4.50028 2.6474L5.68021 0.92574Z" fill="currentColor"></path>
                                </svg>
                            </div>
                        @endfor
                        @for ($j=0; $j < (5 - $avgVote); $j++)
                            <div class="text-gray-600 dark:taxt-grey-400 mr-1 w-3.5 flex-none">
                                <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5.68021 0.92574C6.31574 -0.00157559 7.68426 -0.00157684 8.31979 0.925739L9.49972 2.6474C9.70777 2.95097 10.0141 3.17354 10.3671 3.27759L12.3691 3.86775C13.4474 4.18562 13.8703 5.48717 13.1848 6.37815L11.912 8.03235C11.6876 8.32402 11.5706 8.68415 11.5807 9.05203L11.6381 11.1384C11.669 12.2622 10.5618 13.0666 9.50263 12.6899L7.53608 11.9906C7.18933 11.8673 6.81067 11.8673 6.46392 11.9906L4.49738 12.6899C3.43816 13.0666 2.331 12.2622 2.3619 11.1384L2.41929 9.05203C2.4294 8.68415 2.31239 8.32402 2.08797 8.03235L0.815197 6.37815C0.129656 5.48717 0.552554 4.18562 1.63087 3.86775L3.63289 3.27759C3.98589 3.17354 4.29223 2.95097 4.50028 2.6474L5.68021 0.92574Z" fill="currentColor"></path>
                                </svg>
                            </div>
                        @endfor
                    </div>
                    {{-- Button edit profile --}}
                    <div class="mb-5">
                        <a class="me-5" href="{{ route('developer.edit', ['developer' => $developer->id]) }}">
                            <button class="btn-primary">Modifica</button>
                        </a>
                    </div>
                    {{-- Sponsorship --}}
                    <div class="">
                        @if ($activeSponsorship)
                        <span class="bg-amber-300 text-yellow-800 text-sm font-medium px-2 py-0.5 rounded">Sponsorship attiva</span>
                        @php
                            $date = date('d/m/Y', strtotime($developer->sponsorship_expire_date));
                            $time = date('G:i', strtotime($developer->sponsorship_expire_date));
                        @endphp
                        <span class="block mt-1">{{ 'Scadenza il giorno '. $date . ' alle ore ' . $time }}</span>
                        @endif
                    </div>
                </div>
            </div>
    
            {{-- List with all the developer info --}}
            <dl class="text-black divide-y divide-gray-200 dark:text-white dark:divide-gray-700">
                <div class="flex flex-col pb-3">
                    <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Email</dt>
                    <dd class="text-lg font-semibold">{{ $developer->user->email }}</dd>
                </div>
                <div class="flex flex-col py-3">
                    <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Numero di Telefono</dt>
                    <dd class="text-lg font-semibold">{{ $developer->phone_number }}</dd>
                </div>
                <div class="flex flex-col py-3">
                    <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Indirizzo</dt>
                    <dd class="text-lg font-semibold">{{ $developer->address }}</dd>
                </div>
                <div class="flex flex-col py-3">
                    <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Anni di Esperienza</dt>
                    <dd class="text-lg font-semibold">{{ $developer->experience_year }}</dd>
                </div>
                <div class="flex flex-col py-3">
                    <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Descrizione</dt>
                    <dd class="text-lg font-semibold">{{ $developer->profile_description }}</dd>
                </div>
            </dl>


            <h2 class="mb-2 pt-3 text-lg text-gray-500 dark:text-gray-400 border-t border-t-gray-200 dark:border-t-gray-700">Campi di Lavoro</h2>
            <ul class="max-w-md space-y-1 text-gray-900 list-inside dark:text-white">
                @foreach ($developer->work_fields as $work_field)
                    <li class="flex items-center font-semibold">
                        <svg class="w-3.5 h-3.5 mr-2 text-gray-500 dark:text-gray-400 flex-shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                        </svg>
                        {{ $work_field->name }}
                    </li>
                @endforeach
                
            </ul>

        </div>
    </main>
@endsection