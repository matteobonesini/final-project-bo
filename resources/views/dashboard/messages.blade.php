@extends('layouts.app')

@section('main-content')
<main class="w-full h-full bg-shapeline">
    <section class= "text-[--text]  dark:text-[--dark-text]">
        <div class="w-fullcontainer mx-auto px-4 py-12">
            <div class="flex flex-col items-center">
                <div class="mb-8 md:mb-12 lg:mb-16">
                    <div class="w-full max-w-[800px] text-center">
                        <h2 class="text-[--text] dark:text-[--dark-text] mb-5 text-5xl font-bold md:text-5xl custom-shadow bg-[--transparent] p-4 rounded-xl ">
                            Messaggi in Arrivo
                        </h2>
                    </div>
                </div>
            </div>
            {{-- Messages --}}
            <div class="grid grid-cols-1 justify-items-center gap-5 sm:grid-cols-1 md:grid-cols-2 xl:grid-cols-3">
                @foreach($messages as $message)
                    <div class="bg-white flex flex-col justify-between p-4 rounded-lg custom-shadow">
                        <h2 class="text-[--text] text-xl font-semibold">{{ $message->name }}</h2>
                        <p class="text-gray-600">{{ $message->title }}</p>
                        <p class="text-[--text] mt-4">{{ $message->content }}</p>
                        <p class="text-blue-500 mt-6 align-text-bottom">{{ $message->email }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</main>

@endsection