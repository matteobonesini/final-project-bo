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
                                @php $reviews = $developer->reviews->toQuery()->orderBy('id', 'desc')->get(); @endphp
                                    @foreach ($reviews as $key => $singleReview)
                                        <div class="card-body">
                                            <h5 class="font-bold text-lg text-[--primary] dark:text-[--dark-primary] mb-4">
                                                {{ $singleReview->customer_name }}
                                            </h5>
                                            @if ($developer->votes->isEmpty())
                                                Non ci sono valutazioni
                                            {{-- @else
                                                @if($developer->votes[$singleReview->id])
                                                    <h5 class=" font-medium">
                                                        {{ $developer->votes[0]->name }}
                                                    </h5>
                                                @endif --}}
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