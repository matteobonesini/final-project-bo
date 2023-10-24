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
                        <div class="flex flex-col justify-between p-6 mx-auto w-full text-center text-gray-900 bg-white rounded-lg border border-gray-100 shadow dark:border-gray-600 xl:p-8 dark:bg-gray-800 dark:text-white">
                            <div>
                                <h3 class="mb-4 text-2xl font-bold">
                                    {{ $sponsorship->name }}
                                </h3>
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
        <section id="buy-section" class="hidden relative">
            <form class="w-full max-w-3xl mx-auto bg-slate-50 dark:bg-slate-700 px-2 py-8 form-body flex flex-wrap my-10">
                @csrf
                @if ($errors->any())
                    <div class="alert alert-error">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>- {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <h3 class="w-full text-[--text] dark:text-[--dark-text] text-center text-lg font-semibold mb-5">
                    Compila il form con i tuoi dati
                </h3>
                <h5 class="w-full text-[--text] dark:text-[--dark-text] text-center">
                    I campi contrassegnati con <span class="text-red-500">*</span> sono obbligatori
                </h5>
                <div class="flex flex-wrap md:flex-nowrap w-full md:w-full p-4">
                    <div class="w-full mx-4 my-2">
                        <label for="" class="form-label"><span class="text-red-500">*</span> Nome</label>
                        <input type="text" id="name" name="name" class="form-input @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                    </div>
                    <div class="w-full mx-4 my-2">
                        <label for="" class="form-label"><span class="text-red-500">*</span> Cognome</label>
                        <input type="text" id="lastname" name="lastname" class="form-input @error('lastname') is-invalid @enderror" value="{{ old('lastname') }}" required>
                    </div>
                </div>
                <div class="flex flex-wrap md:flex-nowrap w-full md:w-full p-4">
                    <div class="w-full mx-4 my-2">
                        <label for="" class="form-label dark:text-[--dark-text] text-[--text]"><span class="text-red-500">*</span> Indirizzo</label>
                        <input type="text" class="form-input @error('address') is-invalid @enderror" id="address" name="address" value="{{ old('address') }}" required>
                    </div>
                    <div class="w-full mx-4 my-2">
                        <label for="" class="form-label dark:text-[--dark-text] text-[--text]"><span class="text-red-500">*</span> Città</label>
                        <input type="text" class="form-input @error('city') is-invalid @enderror" id="city" name="city" value="{{ old('city') }}" required>
                    </div>
                </div>
                <div class="flex flex-wrap md:flex-nowrap w-full md:w-full p-4">
                    <div class="w-full mx-4 my-2">
                        <label for="" class="form-label dark:text-[--dark-text] text-[--text]"><span class="text-red-500">*</span> Codice Postale</label>
                        <input type="text" class="form-input @error('zip-code') is-invalid @enderror" id="zip-code" name="zip-code" value="{{ old('zip-code') }}" required>
                    </div>
                    <div class="w-full mx-4 my-2">
                        <label for="" class="form-label dark:text-[--dark-text] text-[--text]">Telefono</label>
                        <input type="text" class="form-input @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}">
                    </div>
                </div>
                <div class="flex flex-wrap md:flex-nowrap w-full md:w-full p-4 border-t-2 border-white">
                    <div class="w-full mx-4 my-2 ">
                        <label for="" class="form-label dark:text-[--dark-text] text-[--text]">Abbonamento Selezionato</label>
                        <input type="text" id="check-out-tier" name="check-out-tier" class="rounded-lg border-b-2 border-gray-600 bg-gray-50 dark:bg-gray-700 p-2.5 text-[--text] dark:text-[--dark-text]" readonly/>
                    </div>
                    <div class="w-full mx-4 my-2">
                        <label for="" class="form-label dark:text-[--dark-text] text-[--text]">Totale</label>
                        <div class="flex items-center rounded-lg border-2 border-gray-600 bg-gray-50 dark:bg-gray-700 text-[--text] dark:text-[--dark-text] overflow-hidden">
                            <label for="" class="h-full p-3 bg-gray-50 dark:bg-gray-500 text-[--text] dark:text-[--dark-text]">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.25 7.756a4.5 4.5 0 100 8.488M7.5 10.5h5.25m-5.25 3h5.25M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                  </svg>
                            </label>
                            <input type="text" id="check-out-price" name="check-out-price" class=" border-white dark:border-gray-700 bg-gray-50 dark:bg-gray-700 h-full text-[--text] dark:text-[--dark-text]" readonly>
                        </div>
                    </div>
                </div>
                {{-- Braintree --}}
                <div id="dropin-container" class="max-w-lg flex mx-auto justify-center items-center">
                </div>
                <div class="w-full flex justify-center items-center my-4">
                    <button type="button" id="submit-button" class="btn bg-green-500 text-white">Paga</button>
                </div>
                {{-- End Braintree --}}
            </form>

            <div id="success-modal" class="z-10 hidden absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 rounded-2xl  bg-white ">
                <a href="{{ route('dashboard') }}">
                    <button class="close-modal flex justify-end w-full p-2 cursor-pointer group">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="group-hover:bg-red-400 group-hover:scale-110 transition-all rounded-full w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </button>
                </a>
                <div class="flex items-center md:px-20 md:pb-12 px-8 pb-8">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-green-500 w-24 h-24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <h3 id="success-message" class="text-center w-full font-bold text-xl"></h3>
                </div>
            </div>
            
        </section>
    </main>

    <div class="blur-layer fixed top-0 left-0 h-screen w-screen hidden"></div>

    <script>
        const button = document.querySelector('#submit-button');
        const successModal = document.getElementById('success-modal');
        const successMessage = document.getElementById('success-message');
        const closeModal = document.querySelector('.close-modal');
        const layer = document.querySelector('.blur-layer');
        const braintreeElem = document.querySelector('#dropin-container');

        // Cards buttons 
        const tier1Btn = document.getElementById('1');
        const tier2Btn = document.getElementById('2');
        const tier3Btn = document.getElementById('3');

        const buySection = document.getElementById('buy-section');

        let selectedTier = '';
        let selectedTierPrice = '';

        tier1Btn.addEventListener('click', () => {
            buySection.classList.remove('hidden');
            document.getElementById('check-out-tier').value = 'Tier 1';
            selectedTier = 'Tier 1';
            document.getElementById('check-out-price').value = '2.99';
            selectedTierPrice = '2.99';
        });

        tier2Btn.addEventListener('click', () => {
            buySection.classList.remove('hidden');
            document.getElementById('check-out-tier').value = 'Tier 2';
            selectedTier = 'Tier 2';
            document.getElementById('check-out-price').value = '5.99';
            selectedTierPrice = '5.99';
        });

        tier3Btn.addEventListener('click', () => {
            buySection.classList.remove('hidden');
            document.getElementById('check-out-tier').value = 'Tier 3';
            selectedTier = 'Tier 3';
            document.getElementById('check-out-price').value = '9.99';
            selectedTierPrice = '9.99';
        });


        // Braintree data exchange
        braintree.dropin.create({
            authorization: '{{ $clientToken }}',
            container: '#dropin-container'
            }, (createErr, instance) => {
                button.addEventListener('click', () => {
                    const inputPrice = document.querySelector('#check-out-price').value;
                    const inputTier = document.querySelector('#check-out-tier').value;
                    const inputName = document.querySelector('#name').value;
                    const inputLastname = document.querySelector('#lastname').value;
                    const inputAddress = document.querySelector('#address').value;
                    const inputCity = document.querySelector('#city').value;
                    const inputZipcode = document.querySelector('#zip-code').value;
                    const inputPhone = document.querySelector('#phone').value;
                    
                    instance.requestPaymentMethod( (err,payload) => {
                        // send amount and nonce(unique token) to the server
                        axios.post('/dashboard/payment', {
                            amount: inputPrice,
                            nonce: payload.nonce,
                            tier: inputTier,
                            name: inputName,
                            lastname: inputLastname,
                            address: inputAddress,
                            city: inputCity,
                            zipcode: inputZipcode,
                            phone: inputPhone,
                        })
                        .then(function (response) {
                            console.log(payload.nonce);
                            console.log('response: ', response);
                            if (response != null && response.data.success == 'true') {
                                console.log('modale aperto', response);
                                successMessage.innerHTML = response.data.message;
                                braintreeElem.classList.add('hidden');
                                console.log(successModal);
                                successModal.classList.remove('hidden');
                                layer.classList.remove('hidden');
                            }
                        })
                        .catch(function (error) {
                            console.log('error: ', error);
                        }); 
                    });
                });
        });

        // Modal closure
        closeModal.addEventListener('click', function() {
            successModal.classList.add('hidden');
            layer.classList.add('hidden');
        });
    </script>
@endsection