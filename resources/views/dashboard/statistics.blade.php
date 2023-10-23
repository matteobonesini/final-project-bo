@extends('layouts.app')

@section('main-content')
    <main class="w-full h-full overflow-y-auto">
        <section class="h-full mx-auto container px-10 py-12">
            <div class="w-full text-center mb-12 border-b-2 border-slate-700 pb-5">
                <h2 class="max-w-lg mx-auto text-[--tertiary] dark:text-[--dark-tertiary] mb-5 text-3xl font-bold md:text-5xl custom-shadow bg-[--transparent] p-4 rounded-xl ">
                    Le Tue Statistiche
                </h2>
                <div class="mx-auto w-full max-w-lg">
                    <p class="tracking-[0.2px] text-[--text] dark:text-[--dark-text] font-semibold">
                        Esplora le statistiche del tuo profilo
                    </p>
                </div>
            </div>
            @if ($developer)
                @if (count($developer->votes) === 0 || $developer->votes === null)
                    <div class="group">
                        <h2 class="text-center font-bold text-2xl text-[--text] dark:text-[--dark-text]">
                            Al momento non ci sono recensioni
                        </h2>
                        <div class="flex justify-center my-4">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-16 h-16">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 13.5h3.86a2.25 2.25 0 012.012 1.244l.256.512a2.25 2.25 0 002.013 1.244h3.218a2.25 2.25 0 002.013-1.244l.256-.512a2.25 2.25 0 012.013-1.244h3.859m-19.5.338V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18v-4.162c0-.224-.034-.447-.1-.661L19.24 5.338a2.25 2.25 0 00-2.15-1.588H6.911a2.25 2.25 0 00-2.15 1.588L2.35 13.177a2.25 2.25 0 00-.1.661z" />
                            </svg>
                        </div>
                        <div class="w-16 absolute bottom-0 right-0 scale-0 transition-all group-hover:scale-100">
                            <img class="w-full h-full" src="{{ Vite::image('disappointedMan.png') }}" alt="">
                        </div>
                    </div>
                @elseif (count($developer->messages) === 0 || $developer->messages === null)
                    <div>
                        <h2 class="text-center font-bold text-2xl text-[--text] dark:text-[--dark-text]">
                            Al momento non ci sono contenuti da mostrare
                        </h2>
                        <div class="flex justify-center my-4 group">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-[--text] dark:text-[--dark-text] w-16 h-16">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 13.5h3.86a2.25 2.25 0 012.012 1.244l.256.512a2.25 2.25 0 002.013 1.244h3.218a2.25 2.25 0 002.013-1.244l.256-.512a2.25 2.25 0 012.013-1.244h3.859m-19.5.338V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18v-4.162c0-.224-.034-.447-.1-.661L19.24 5.338a2.25 2.25 0 00-2.15-1.588H6.911a2.25 2.25 0 00-2.15 1.588L2.35 13.177a2.25 2.25 0 00-.1.661z" />
                            </svg>
                            <div class="w-16 absolute bottom-0 right-0 scale-0 transition-all group-hover:scale-100">
                                <img class="w-full h-full" src="{{ Vite::image('disappointedMan.png') }}" alt="">
                            </div>
                        </div>
                        
                    </div>
                @else
                    <div class="w-full flex flex-wrap justify-center">
                        <div class="m-3 text-center bg-[--transparent] dark:bg-[--dark-transparent] p-3 rounded-lg">
                            <canvas class="max-w-xs max-h-80 mt-2" id="messages-year"></canvas>
                        </div>
                        <div class="m-3 text-center bg-[--transparent] dark:bg-[--dark-transparent] p-3 rounded-lg">
                            <canvas class="max-w-xs max-h-80 mt-2" id="messages-month"></canvas>
                        </div>
                    
                        <div class="m-3 text-center bg-[--transparent] dark:bg-[--dark-transparent] p-3 rounded-lg">
                            <canvas class="max-w-xs max-h-80 mt-2" id="votes-year"></canvas>
                        </div>
                        <div class="m-3 text-center bg-[--transparent] dark:bg-[--dark-transparent] p-3 rounded-lg">
                            <canvas class="max-w-xs max-h-80 mt-2" id="votes-month"></canvas>
                        </div>
                    
                        <div class="m-3 text-center bg-[--transparent] dark:bg-[--dark-transparent] p-3 rounded-lg">
                            <canvas class="max-w-xs max-h-80 mt-2" id="reviews-year"></canvas>
                        </div>
                        <div class="m-3 text-center bg-[--transparent] dark:bg-[--dark-transparent] p-3 rounded-lg">
                            <canvas class="max-w-xs max-h-80 mt-2" id="reviews-month"></canvas>
                        </div>
                    </div>
                @endif
            @endif
        </section>
    </main> 
    
    <script>
        let messagesArr = {!! json_encode($developer->messages->toArray()) !!};
        let reviewsArr = {!! json_encode($developer->reviews->toArray()) !!};
        let votesArr = {!! json_encode($developer->votes->toArray()) !!};
    </script>

@endsection