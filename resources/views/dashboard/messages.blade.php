@extends('layouts.app')

@section('main-content')
    <main class="w-full h-full overflow-y-auto pb-12">
        <section class= "text-[--text]  dark:text-[--dark-text]">
            <div class="container mx-auto px-10 py-12">
                <div class="flex flex-col items-center mb-8 md:mb-12 lg:mb-16">
                    <div class="w-full text-center mb-12 border-b-2 border-slate-700 pb-5">
                        <h2 class="max-w-lg mx-auto text-[--tertiary] dark:text-[--dark-tertiary] mb-5 text-3xl font-bold md:text-5xl custom-shadow bg-[--transparent] p-4 rounded-xl ">
                            Messaggi in Arrivo
                        </h2>
                        <div class="mx-auto w-full max-w-lg">
                            <p class="tracking-[0.2px] text-[--text] dark:text-[--dark-text] font-semibold">
                                Esplora le statistiche del tuo profilo
                            </p>
                        </div>
                    </div>
                    @if($developer)
                        @if($developer->messages->isEmpty())
                        <div class="group">
                            <h2 class="text-center font-bold text-2xl text-[--text] dark:text-[--dark-text]">
                                Al momento non ci sono messaggi
                            </h2>
                            <div class="flex justify-center my-4">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-[--text] dark:text-[--dark-text] w-16 h-16">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 13.5h3.86a2.25 2.25 0 012.012 1.244l.256.512a2.25 2.25 0 002.013 1.244h3.218a2.25 2.25 0 002.013-1.244l.256-.512a2.25 2.25 0 012.013-1.244h3.859m-19.5.338V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18v-4.162c0-.224-.034-.447-.1-.661L19.24 5.338a2.25 2.25 0 00-2.15-1.588H6.911a2.25 2.25 0 00-2.15 1.588L2.35 13.177a2.25 2.25 0 00-.1.661z" />
                                </svg>
                            </div>
                            <div class="w-16 absolute bottom-0 right-0 scale-0 transition-all group-hover:scale-100">
                                <img class="w-full h-full" src="{{ Vite::image('disappointedMan.png') }}" alt="">
                            </div>
                        </div>
                        @else
                            <div class="grid grid-cols-1 justify-items-center gap-5 sm:grid-cols-1 md:grid-cols-2 xl:grid-cols-3">
                                @foreach ($developer->messages as $message)
                                    <div class="card-body">
                                        <div class="bg-white flex flex-col justify-between p-4 rounded-lg custom-shadow h-full">
                                            <h2 class="text-[--text] text-xl font-semibold">{{ $message->name }}</h2>
                                            <p class="text-gray-600">{{ $message->title }}</p>
                                            <p class="text-[--text] mt-4">{{ $message->content }}</p>
                                            <p class="text-blue-500 mt-6 align-text-bottom">{{ $message->email }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    @endif
                </div>
            </div>
        </section>
    </main>
@endsection