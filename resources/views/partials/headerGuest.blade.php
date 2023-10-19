<header>
    <nav class="bg-[--bg-secondary] border-gray-200 dark:bg-[--dark-bg-secondary] h-[8%]">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="{{ route('login') }}" class="flex items-center">
                <img src="/LogoSmallRid.png" class="h-full mr-3 w-48 object-cover" alt="BDeveloper Logo" />
            </a>
            <div class="flex md:order-2">
    
                <a href="{{ route('login') }}">
                    <button class="btn-primary">
                        Login
                    </button>
                </a>
    
                <a class="ms-5" href="{{ route('register') }}">
                    <button class="btn-primary">
                        Registrati
                    </button>
                </a>
                
                <button data-collapse-toggle="navbar-cta" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-cta" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                    </svg>
                </button>
            </div>
        </div>
    </nav>
</header>