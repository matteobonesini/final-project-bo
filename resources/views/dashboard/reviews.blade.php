@extends('layouts.app')

@section('main-content')

    
<section class="bg-[--background] text-[--text] dark:bg-[--dark-background] dark:text-[--dark-text]">
    <!-- Container -->
    <div class="mx-auto w-fullcontainer px-5 py-12">
      <!-- Component -->
        <div class="flex flex-col items-center">
            <!-- Heading Content -->
            <div class="mb-8 md:mb-12 lg:mb-16">
                <div class="w-full max-w-[800px] text-center">
                        <h2 class="text-[--primary] dark:text-[--dark-primary] mb-5 text-3xl font-bold md:text-5xl">
                            Le Tue Recensioni
                        </h2>
                        <div class="mx-auto w-full max-w-lg">
                            <p class="tracking-[0.2px] text-[--text] dark:text-[--dark-text]">
                                Ciò che pensano i clienti dei tuoi servizi
                            </p>
                        </div>
                </div>
            </div>
            <!-- Reviews -->
            <div class="mb-12 md:mb-16 lg:mb-20">
                <div class="grid grid-cols-1 justify-items-center gap-5 sm:grid-cols-1 md:grid-cols-2">
                    @for($i=0; $i < 4; $i++)
                        <!-- Review Item -->
                        <div class="flex flex-col gap-6 rounded-lg bg-[--secondary] dark:bg-[--dark-secondary] p-8 md:gap-4">
                            <div class="flex flex-wrap justify-center">
                                <div class="bg-[--tertiary] p-2 rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                    </svg>
                                </div>
                                <div class="w-full text-center">
                                    <h6 class="text-sm mt-2 font-bold md:text-base text-[--text] dark:text-[--dark-text]">
                                        Jessica Smith
                                    </h6>
                                </div>
                            </div>
                            <div class="flex text-yellow-600 dark:text-yellow-400 justify-center">
                                @for ($j=0; $j < 5; $j++)
                                    <div class="mr-1 w-3.5 flex-none">
                                        <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M5.68021 0.92574C6.31574 -0.00157559 7.68426 -0.00157684 8.31979 0.925739L9.49972 2.6474C9.70777 2.95097 10.0141 3.17354 10.3671 3.27759L12.3691 3.86775C13.4474 4.18562 13.8703 5.48717 13.1848 6.37815L11.912 8.03235C11.6876 8.32402 11.5706 8.68415 11.5807 9.05203L11.6381 11.1384C11.669 12.2622 10.5618 13.0666 9.50263 12.6899L7.53608 11.9906C7.18933 11.8673 6.81067 11.8673 6.46392 11.9906L4.49738 12.6899C3.43816 13.0666 2.331 12.2622 2.3619 11.1384L2.41929 9.05203C2.4294 8.68415 2.31239 8.32402 2.08797 8.03235L0.815197 6.37815C0.129656 5.48717 0.552554 4.18562 1.63087 3.86775L3.63289 3.27759C3.98589 3.17354 4.29223 2.95097 4.50028 2.6474L5.68021 0.92574Z" fill="currentColor"></path>
                                        </svg>
                                    </div>
                                @endfor
                            </div>
                            <p>
                                Using this payment app has been a game-changer for my business. It's incredibly user-friendly and secure. I can easily manage transactions, send invoices, and track payments all in one place. It has truly simplified my financial
                            </p>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
</section>
@endsection