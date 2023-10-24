<nav class="bg-zinc-300 border-gray-200 dark:bg-zinc-900 h-full flex items-center border-b-2">
    <div class="w-full flex flex-wrap md:flex-nowrap items-center justify-between px-10 py-4">
        <a href="{{ route('dashboard') }}" class="flex items-center">
            <img src="/LogoSmallRid.png" class="h-full w-32 md:w-48 mr-3 object-cover" alt="BDeveloper Logo" />
        </a>
      <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-600 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
          <span class="sr-only">Open main menu</span>
          <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
          </svg>
      </button>
      
      <div class="hidden w-full md:block md:w-auto" id="navbar-default">
        <div class="hidden md:flex items-center flex-row space-x-4 mt-0 border-0 dark:border-gray-700">
            @if (isset($developer))
                <a class="flex items-center gap-2" href="{{ route('sponsorship') }}">
                    <button class="bg-amber-300 rounded-2xl py-2 px-4 hover:scale-110 transition-all font-bold">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="inline-block w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z" />
                        </svg>
                        <span class="hidden lg:inline-block">Acquista o estendi sponsorizzazione</span>
                    </button>
                </a>
                <a href="{{ route('developer.show', ['developer' => $developer->id]) }}">
                    <button class="btn btn-accent text-[--text] dark:text-[--dark-text] btn-shadow md:inline-block">
                        Mostra Profilo
                    </button>
                </a>
                <a href="{{ route('developer.edit', ['developer' => $developer->id]) }}">
                    <button class="btn-secondary md:inline-block">
                        Modifica Profilo
                    </button>
                </a>
            @else
                <div class = "block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
                    <a href="{{ route('developer.create') }}">
                        <button class="btn bg-gray-200 dark:bg-[--dark-accent] text-[--text] dark:text-[--dark-text] btn-shadow md:inline-block">
                            Crea Profilo
                        </button>
                    </a>
                </div>
            @endif  
        </div>
        <div class="block md:hidden text-white pt-10">
            <ul>
                @if (isset($developer))
                    <li class="mb-3">
                        <a href="{{ route('sponsorship') }}">Sponsorizzazione</a>
                    </li>
                    <li class="mb-3">
                        <a href="{{ route('developer.show', ['developer' => $developer->id]) }}">Profilo</a>
                    </li>
                    <li>
                        <a href="{{ route('developer.edit', ['developer' => $developer->id]) }}">Modifica Profilo</a>
                    </li>
                @else
                <li>
                    <a href="{{ route('developer.create') }}">Crea Profilo</a>
                </li>
                @endif 
            </ul>
        </div>
    </div>

</nav>