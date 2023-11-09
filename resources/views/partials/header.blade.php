<nav class="bg-zinc-400 dark:bg-zinc-900 h-full flex items-center">
    <div class="w-full flex flex-wrap md:flex-nowrap items-center justify-between p-2 sm:p-5 ">
        <a href="{{ route('dashboard') }}" class="flex items-center">
            <img src="/logo-hor-final.png" class="h-16 mr-3 w-48 object-cover" alt="BDeveloper Logo" />
        </a>
      <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-600 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
          <span class="sr-only">Open main menu</span>
          <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
          </svg>
      </button>

      <div class="hidden w-full md:block md:w-auto" id="navbar-default">
        <div class="hidden md:flex items-center flex-row space-x-5 mt-0 border-0 dark:border-gray-700">
            <button class="btn bg-sky-800 text-[--dark-text] btn-shadow md:inline-block" onclick="changeTheme()">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6 inline-block align-middle">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" />
                </svg>
                <span id="themeStatus" class="align-middle ml-1">Auto</span>
            </button>
            @if (isset($developer))
                <a href="{{ route('developer.show', ['developer' => $developer->id]) }}">
                    <button class="btn btn-accent text-[--dark-text] btn-shadow md:inline-block">
                        Mostra Profilo
                    </button>
                </a>
                <a href="{{ route('developer.edit', ['developer' => $developer->id]) }}">
                    <button class="btn btn-secondary md:inline-block">
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

<script>
    let themeStatus = document.getElementById('themeStatus');

    // set initial theme
    if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.documentElement.classList.add('dark')
    } else {
        document.documentElement.classList.remove('dark')
    }

    // set initial theme status on button 
    switch (localStorage.theme) {
            case 'light':
                themeStatus.innerHTML = 'Chiaro';
                break;
            case 'dark':
                themeStatus.innerHTML = 'Scuro';
                break;
            default:
                themeStatus.innerHTML = 'Auto';
        }

    function changeTheme() {
        switch (localStorage.theme) {
            case 'light':
                localStorage.theme = 'dark';
                document.documentElement.classList.add('dark')
                themeStatus.innerHTML = 'Scuro';
                break;
            case 'dark':
                localStorage.removeItem('theme');
                if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                    document.documentElement.classList.add('dark')
                } else {
                    document.documentElement.classList.remove('dark')
                }
                themeStatus.innerHTML = 'Auto';
                break;
            default:
                localStorage.theme = 'light';
                document.documentElement.classList.remove('dark')
                themeStatus.innerHTML = 'Chiaro';
        }
    }
</script>