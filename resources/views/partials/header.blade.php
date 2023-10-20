    
<nav class="bg-zinc-300 border-gray-200 dark:bg-zinc-900 h-full p-1 flex items-center border-b-2">
    <div class="w-full flex flex-wrap md:flex-nowrap items-center justify-between px-10">
        <a href="{{ route('dashboard') }}" class="flex items-center">
            <img src="/LogoSmallRid.png" class="h-full mr-3 w-48 object-cover" alt="BDeveloper Logo" />
        </a>
      <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-600 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
          <span class="sr-only">Open main menu</span>
          <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
          </svg>
      </button>
      
      <div class="hidden w-full md:block md:w-auto" id="navbar-default">
        <div class="flex absolute md:static top-10 right-1 z-10 md:items-center flex-col p-2 px-4 mt-4 border border-gray-100 rounded-lg md:flex-row md:space-x-8 md:mt-0 md:border-0 dark:border-gray-700">
            @if (isset($developer))
                <button class="bg-yellow-500 rounded-2xl py-2 px-4 hover:scale-110 lg:me-40 transition-all">
                    <a class="flex items-center gap-2" href="{{ route('sponsorship') }}">
                        <h5 class="hidden lg:block">Aumenta la visibilità del tuo profilo!</h5>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </a>
                </button>
                <a href="{{ route('developer.show', ['developer' => $developer->id]) }}">
                    <button class="btn btn-accent text-[--text] dark:text-[--dark-text] btn-shadow me-4  md:inline-block">
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
        </ul>
    </div>

</nav>