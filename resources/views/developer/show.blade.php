@extends('layouts.app')

@section('main-content')
    <main>
        <div class="container mx-auto mt-16 px-4">
            <div class="flex justify-evenly items-center mb-10">
                {{-- Profile Picture --}}
                <img class="rounded-lg w-32 object-cover" src="{{ $developer->full_img_src }}" alt="{{ $developer->user->name }}">
                <div>
                    {{-- Developer Name --}}
                    <h1 class="text-4xl font-bold">{{ $developer->user->name }}</h1>
                    {{-- Developer Average Vote --}}
                    <span>Media voti: {{ $avgVote }}</span>
                    <div class="mt-5">
                        {{-- Button for see the cv and edit profile --}}
                        <a href="{{ $developer->full_cv_src }}">
                            <button class="btn-primary">Curriculum</button>
                        </a>
                        <a class="ms-5" href="{{ route('developer.edit', ['developer' => $developer->id]) }}">
                            <button class="btn-primary">Modifica</button>
                        </a>
                    </div>
                </div>
            </div>
    
            {{-- List with all the developer info --}}
            <dl class="text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700">
                <div class="flex flex-col pb-3">
                    <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Email</dt>
                    <dd class="text-lg font-semibold">{{ $developer->user->email }}</dd>
                </div>
                <div class="flex flex-col pt-3">
                    <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Phone number</dt>
                    <dd class="text-lg font-semibold">{{ $developer->phone_number }}</dd>
                </div>
                <div class="flex flex-col py-3">
                    <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Address</dt>
                    <dd class="text-lg font-semibold">{{ $developer->address }}</dd>
                </div>
                <div class="flex flex-col py-3">
                    <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Year of Experience</dt>
                    <dd class="text-lg font-semibold">{{ $developer->experience_year }}</dd>
                </div>
                <div class="flex flex-col py-3">
                    <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Description</dt>
                    <dd class="text-lg font-semibold">{{ $developer->profile_description }}</dd>
                </div>
            </dl>
        </div>
    </main>
@endsection