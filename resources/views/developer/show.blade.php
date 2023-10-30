@extends('layouts.app')

@section('main-content')
    <main class="bg-zinc-50 dark:bg-zinc-900 w-full h-full overflow-y-auto text-black dark:text-white">
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