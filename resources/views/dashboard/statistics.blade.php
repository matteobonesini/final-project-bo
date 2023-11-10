@extends('layouts.app')

@section('main-content')
    <main class="w-full h-full overflow-y-auto">
        <section class="h-full mx-auto container px-10 py-12">
            <div class="w-full text-center mb-8 md:mb-12 lg:mb-16 border-b-2 border-slate-700 pb-5">
                <h2 class="max-w-lg mx-auto text-[--tertiary] dark:text-[--dark-tertiary] mb-5 text-3xl font-bold md:text-5xl custom-shadow bg-[--transparent] p-4 rounded-xl ">
                    Le Tue Statistiche
                </h2>
                <div class="mx-auto w-full max-w-lg">
                    <p class="tracking-[0.2px] text-[--text] dark:text-[--dark-text] font-semibold">
                        Esplora le statistiche del tuo profilo
                    </p>
                </div>
            </div>
            
            <div>
                <label for="period" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Periodo</label>
                <select id="period" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected value="0">Ultimo anno</option>
                    <option value="6">Ultimi 6 mesi</option>
                    <option value="9">Ultimi 3 mesi</option>
                </select>
            </div>

            {{-- Messages --}}
            <div class="w-full lg:w-[80%] mx-auto mt-10 bg-zinc-300 rounded-xl">
                <canvas id="messages"></canvas>
            </div>

            {{-- Reviews --}}
            <div class="w-full lg:w-[80%] mx-auto my-10 bg-zinc-300 rounded-xl">
                <canvas id="reviews"></canvas>
            </div>
            
        </section>
    </main> 
    
    <script>
        let messagesArr = {!! json_encode($messagesDataChart) !!};
        let reviewsArr = {!! json_encode($reviewsDataChart) !!};
    </script>

@endsection