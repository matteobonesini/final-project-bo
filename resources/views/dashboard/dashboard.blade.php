@extends('layouts.app')

@section('main-content')
    <main class="w-full h-full overflow-y-auto pb-12">
        <div class="container mx-auto px-5">
            <h1 class="font-bold text-[--tertiary] dark:text-[--dark-tertiary] text-4xl my-8 pb-5 border-b-2 border-slate-700">
                Dashboard
            </h1>
            
            
            @if ($developer)
                <section class="grid sm:grid-cols-1 md:grid-cols-2 gap-10">
                    <div class="bg-[--transparent] dark:bg-[--dark-transparent] p-5 rounded-lg">
                        <h4 class="font-bold text-2xl text-[--text] dark:text-[--dark-text] mb-6">
                            Ultime Recensioni
                        </h4>
                        <div class="grid grid-cols-1 gap-3">
                            @if($developer)
                                @if($developer->reviews->isEmpty())
                                    <span class="text-black dark:text-white">Non ci sono recensioni</span> 
                                @else
                                    @foreach ($developer->reviews as $singleReview)
                                        <div class="card-body">
                                            <h5 class="font-bold text-lg text-[--primary] dark:text-[--dark-primary] mb-4">
                                                {{ $singleReview->customer_name }}
                                            </h5>
                                            @if ($developer->votes->isEmpty())
                                                Non ci sono valutazioni
                                            @else
                                                @foreach ($developer->votes as $vote)
                                                    @if($vote->pivot->developer_id == $singleReview->developer_id)
                                                        <h5 class=" font-medium">
                                                            {{ $vote->name }}
                                                        </h5>
                                                    @endif
                                                @endforeach
                                            @endif
                                            <p>
                                                {{ $singleReview->description}}
                                            </p>
                                        </div>
                                    @endforeach
                                @endif
                            @endif
                        </div>
                    </div>
                    <div class="bg-[--transparent] dark:bg-[--dark-transparent] p-5 rounded-lg">
                        <h4 class="font-bold text-2xl text-[--text] dark:text-[--dark-text] mb-6">
                            Ultimi Messaggi
                        </h4>
                        @if($developer)
                            <div class="grid grid-cols-1 gap-3">
                                @if($developer->messages->isEmpty())
                                    <span class="text-black dark:text-white">Non ci sono recensioni</span> 
                                @else
                                    @foreach ($developer->messages as $singleMessage)
                                        <div class="card-body">
                                            <h5 class="text-[--primary] dark:text-[--dark-primary] font-bold text-lg">
                                                {{ $singleMessage->name }}
                                            </h5>
                                            <p>
                                                {{ $singleMessage->title}}
                                            </p>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        @endif
                    </div>
                </section>
                <div class="relative">
                    <button class="rounded-full absolute top-2 right-2 hover:bg-white hover:scale-125 transition-all peer">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                          </svg>
                    </button>
                    <div class="text-center my-10 bg-amber-300 rounded-2xl p-4 peer-focus:hidden">
                        <h2 class="text-center p-3 text-2xl font-bold">
                            Aumenta la visibilità del tuo profilo!
                            <p class="my-2 text-xl">
                                Acquistando ora la sponsorship il tuo profilo sarà più facile da trovare ed avrai molte più possibilità di ricevere lavoro
                            </p> 
                        </h2>
                        <a href="{{ route('developer.edit', ['developer' => $developer->id]) }}">
                            <button class="btn-accent">
                                Clicca Qui
                            </button>
                        </a>
                    </div>
                    
                </div>
            @else
                <section class="flex justify-center">
                    <a href="{{ route('developer.create') }}">
                        <button class="btn-secondary mt-20">Inizia creando il tuo profilo</button>
                    </a>
                </section>
            @endif
            
        </div>
    </main>
@endsection