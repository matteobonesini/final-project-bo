<nav class="bg-green-900 dark:bg-zinc-900 border-gray-200 h-[8%]">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="{{ route('login') }}" class="flex items-center">
            <img src="/logo-hor-final.png" class="h-16 mr-3 w-48 object-cover" alt="BDeveloper Logo" />
        </a>
        <button data-collapse-toggle="navbar-hamburger" type="button" class="block md:hidden inline-flex items-center justify-center p-2 w-10 h-10 ml-3 text-sm text-gray-500 rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-hamburger" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
            </svg>
        </button>

        <div class="w-full md:w-auto hidden md:block flex md:order-2 justify-end" id="navbar-hamburger">

            <button class="btn-primary" onclick="changeTheme()">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6 inline-block align-middle">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" />
                </svg>
                <span id="themeStatus" class="align-middle ml-1">Auto</span>
            </button>

            <a class="ms-5"  href="{{ route('login') }}">
                <button class="btn-primary">
                    Login
                </button>
            </a>

            <a class="ms-5 "href="{{ route('register') }}">
                <button class="btn-primary">
                    Registrati
                </button>
            </a>
            
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