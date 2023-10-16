@extends('layouts.app')

@section('main-content')
    <main class="w-full bg-shapeline">
        <div class="container mx-auto px-5">
            <h1 class="font-bold text-[--primary] dark:text-[--dark-primary] text-3xl my-5">
                Dashboard
            </h1>
            <section class="flex flex-wrap gap-10 md:flex-nowrap md:justify-around w-full">
                <div class="bg-[--transparent] dark:bg-[--dark-transparent] p-5">
                    <h4 class="font-bold text-2xl text-[--text] dark:text-[--dark-text] mb-6">
                        Ultime Recensioni
                    </h4>
                    <div class="w-full">
                        @if($developer)
                            @if($developer->votes->isEmpty())
                                Non ci sono recensioni
                            @else
                                @foreach ($developer->reviews as $singleReview)
                                    <div class="card-body">
                                        <h5>
                                            {{ $singleReview->customer_name }}
                                        </h5>
                                        <p>
                                            {{ $singleReview->description}}
                                        </p>
                                    </div>
                                @endforeach
                            @endif
                        @endif
                    </div>
                </div>
                <div class="bg-[--transparent] dark:bg-[--dark-transparent] p-5">
                    <h4 class="font-bold text-2xl text-[--text] dark:text-[--dark-text] mb-6">
                        Ultimi Messaggi
                    </h4>
                    @if($developer)
                        <div class="w-full">
                            @if($developer->messages->isEmpty())
                                Non ci sono messaggi
                            @else
                                @foreach ($developer->messages as $singleMessage)
                                    <div class="card-body">
                                        <h5>
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
            
        </div>
    </main>
@endsection