<aside class="bg-[--secondary] dark:bg-[--dark-secondary] h-full text-[--text] dark:text-[--dark-text] w-20 md:w-auto p-2">
    <div class="h-full flex flex-col justify-between">
        @if (isset($developer))
            <nav class="text-center">
                <ul>
                    <li class="p-2 mb-2 rounded dark:bg-[--accent] bg-[--dark-accent] hover:scale-105 hover:cursor-pointer transition-all">
                        <a class="w-full flex justify-center md:justify-start md:ms-2" href="/dashboard/messages">
                            <div class="md:me-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 m-0">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                                </svg>
                            </div>
                            <span class="hidden md:inline">Messaggi</span> 
                        </a>
                    </li>

                    <li class="p-2 mb-2 rounded dark:bg-[--accent] bg-[--dark-accent] hover:scale-105 hover:cursor-pointer transition-all">
                        <a class="w-full flex justify-center md:justify-start md:ms-2" href="/dashboard/reviews">
                            <div class="md:me-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                                </svg>
                            </div>
                            <span class="hidden md:inline">Recensioni</span> 
                        </a>
                    </li>

                    <li class="p-2 mb-2 rounded dark:bg-[--accent] bg-[--dark-accent] hover:scale-105 hover:cursor-pointer transition-all">
                        <a class="w-full flex justify-center md:justify-start md:ms-2" href="/dashboard/statistics">
                            <div class="md:me-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3v11.25A2.25 2.25 0 006 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0118 16.5h-2.25m-7.5 0h7.5m-7.5 0l-1 3m8.5-3l1 3m0 0l.5 1.5m-.5-1.5h-9.5m0 0l-.5 1.5m.75-9l3-3 2.148 2.148A12.061 12.061 0 0116.5 7.605" />
                                </svg>
                            </div>
                            <span class="hidden md:inline">Statistiche</span> 
                        </a>
                    </li>
                </ul>
            </nav>
        @else
            <nav class="text-center">
            </nav>
        @endif
        
        <div class="mt-5">
            @auth
                <h6 class="text-xs mb-4 text-center bg-zinc-200 dark:bg-zinc-900 p-1 rounded-xl">{{ Auth::user()['name'] }}</h6>
                <form method="POST" action="{{ route('logout') }}" class="flex justify-center">
                    @csrf

                    <button type="submit" class="btn btn-primary flex justify-center w-full">
                        <div class="md:me-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                            </svg>
                        </div>
                        <span class="hidden md:inline break-keep">Logout</span>
                    </button>
                </form>
            @else
                <button type="button" class="btn-primary">
                    Login
                </button>
            @endauth
        </div>
    </div>
</aside>
