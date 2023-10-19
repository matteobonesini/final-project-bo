@extends('layouts.app')

@section('main-content')
    <main class="w-full h-full overflow-y-auto">
        <section class=" bg-[--transparent] dark:bg-[--dark-transparent] rounded-2xl m-10">
            <div class="py-2 px-4 mx-auto max-w-screen-xl lg:py-12 lg:px-6">
                <div class="pb-5 border-b-2 border-slate-700 dark:border-slate-800 mb-12">
                    <h1 class="mb-4 text-4xl text-center first-letter:tracking-tight font-extrabold text-[--text] dark:text-[--dark-text]">
                        Sponsorizzazione
                    </h1>
                </div>
                <div class="mx-auto max-w-screen-md text-center mb-8 lg:mb-12">
                    <h2 class="mb-4 text-3xl tracking-tight font-bold text-[--text] dark:text-[--dark-text]">
                        Disegnate su misura per le vostre esigenze
                    </h2>
                    <p class="mb-5 font-light text-[--text] sm:text-xl dark:text-[--dark-text]">
                        Qui in BDevelopers proponiamo piani che siano in linea con le necessità dei sviluppatori e le richieste del mercato
                    </p>
                </div>

                <div class="space-y-8 lg:grid lg:grid-cols-3 sm:gap-6 xl:gap-10 lg:space-y-0">
                    @foreach ($sponsorships as $index => $sponsorship)
                        <!-- Pricing Card -->
                        <div class="flex flex-col justify-between p-6 mx-auto max-w-lg text-center text-gray-900 bg-white rounded-lg border border-gray-100 shadow dark:border-gray-600 xl:p-8 dark:bg-gray-800 dark:text-white">
                            <div>
                                <h3 class="mb-4 text-2xl font-bold">
                                    {{ $sponsorship->name }}
                                </h3>
                                <p class="font-light text-gray-500 sm:text-lg dark:text-gray-400">
                                    Best option for personal use & for your next project.
                                </p>
                                <div class="my-8">
                                    <span class="text-5xl font-extrabold">{{ $sponsorship->price }} €</span>
                                    <p class="text-gray-500 dark:text-gray-400 mt-2"> per {{ $sponsorship->duration /24 }}
                                        @if ($sponsorship->duration /24 < 2)
                                            giorno
                                        @else
                                            giorni
                                        @endif 
                                    </p>
                                </div>
                                <!-- List -->
                                <ul role="list" class="mb-8 space-y-4 text-left">
                                    @php
                                        $slug = Str::of($sponsorship->name)->slug('-');
                                    @endphp
                                    @foreach (array_keys($sponsorDesc) as $tierKey)
                                        @if ($slug == $tierKey)
                                            @foreach ($sponsorDesc[$tierKey] as $key => $description)
                                                <li class="flex items-center space-x-3">
                                                    <!-- Icon -->
                                                    <svg class="flex-shrink-0 w-5 h-5 text-green-500 dark:text-green-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                                                    <span>{{ $key }}</span>
                                                </li>
                                            @endforeach
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                            <a href="#buy-section">
                                <button class="btn-accent" id="{{ $sponsorship->id }}">
                                    Compra
                                </button>
                            </a>
                            
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <section id="buy-section" class="hidden">
            <form class="w-full max-w-3xl mx-auto bg-slate-50 dark:bg-slate-700 px-2 py-8 form-body flex flex-wrap my-10" action="{{ route('payment') }}">
                @method('POST')
                @csrf
                <h3 class="w-full text-[--text] dark:text-[--dark-text] text-center text-lg font-semibold mb-5">
                    Compila il form con i tuoi dati
                </h3>
                <h5 class="w-full text-[--text] dark:text-[--dark-text] text-center">
                    I campi contrassegnati con <span class="text-red-500">*</span> sono obbligatori
                </h5>
                <div class="flex flex-wrap md:flex-nowrap w-full md:w-full p-4">
                    <div class="w-full mx-4 my-2">
                        <label for="" class="form-label"><span class="text-red-500">*</span> Nome</label>
                        <input type="text" id="name" name="name" class="form-input" value="{{ old('name') }}" required>
                    </div>
                    <div class="w-full mx-4 my-2">
                        <label for="" class="form-label"><span class="text-red-500">*</span> Cognome</label>
                        <input type="text" id="lastname" name="lastname" class="form-input" value="{{ old('lastname') }}" required>
                    </div>
                </div>
                <div class="flex flex-wrap md:flex-nowrap w-full md:w-full p-4">
                    <div class="w-full mx-4 my-2">
                        <label for="" class="form-label dark:text-[--dark-text] text-[--text]"><span class="text-red-500">*</span> Indirizzo</label>
                        <input type="text" class="form-input" name="address" value="{{ old('address') }}" required>
                    </div>
                    <div class="w-full mx-4 my-2">
                        <label for="" class="form-label dark:text-[--dark-text] text-[--text]"><span class="text-red-500">*</span> Città</label>
                        <input type="text" class="form-input" name="city" value="{{ old('city') }}" required>
                    </div>
                </div>
                <div class="flex flex-wrap md:flex-nowrap w-full md:w-full p-4">
                    <div class="w-full mx-4 my-2">
                        <label for="" class="form-label dark:text-[--dark-text] text-[--text]"><span class="text-red-500">*</span> Codice Postale</label>
                        <input type="text" class="form-input" name="zip-code" value="{{ old('zip-code') }}" required>
                    </div>
                    <div class="w-full mx-4 my-2">
                        <label for="" class="form-label dark:text-[--dark-text] text-[--text]">Telefono</label>
                        <input type="text" class="form-input" name="phone" value="{{ old('phone') }}">
                    </div>
                </div>
                <div class="flex flex-wrap md:flex-nowrap w-full md:w-full p-4 border-t-2 border-white">
                    <div class="w-full mx-4 my-2">
                        <label for="" class="form-label dark:text-[--dark-text] text-[--text]">Abbonamento Selezionato</label>
                        <input type="text" id="check-out-tier" name="check-out-tier" class="border-b-2 border-gray-600 bg-gray-50 dark:bg-gray-700 p-2.5 text-[--text] dark:text-[--dark-text]" readonly/>
                    </div>
                    <div class="w-full mx-4 my-2">
                        <label for="" class="form-label dark:text-[--dark-text] text-[--text]">Totale</label>
                        <input type="text" id="check-out-price" name="check-out-price" class="border-b-2 border-gray-600 bg-gray-50 dark:bg-gray-700 p-2.5 text-[--text] dark:text-[--dark-text]" readonly>
                    </div>
                </div>
                <div id="dropin-container" class="max-w-lg flex mx-auto justify-center items-center">
                </div>
                <div class="w-full flex justify-center items-center my-4">
                    <button id="submit-button" class="btn bg-green-500 text-white">Paga</button>
                </div>
            </form>
            <script>
                var button = document.querySelector('#submit-button');
                braintree.dropin.create({
                    authorization: '{{ $clientToken }}',
                    container: '#dropin-container'
                }, function (createErr, instance) {
                    button.addEventListener('click', function () {
                        instance.requestPaymentMethod( (err,payload) => {
                            // send amount and nonce(unique token) to the server
                            axios.post('/payment-process', {
                                amount: selectedTierPrice,
                                nonce: payload.nonce
                            })
                            .then(function (response) {
                                console.log('response: ', response);
                            })
                            .catch(function (error) {
                                console.log('error: ', error);
                            }); 
                        });
                    });
                });
            </script>
        </section>
    </main>
@endsection