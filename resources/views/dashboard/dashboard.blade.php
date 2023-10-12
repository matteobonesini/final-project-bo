@extends('layouts.app')

@section('main-content')

        {{-- <div class="w-full flex justify-center my-5">
            <button class="btn-primary">
                primary 
            </button>
        </div>
        <div class="w-full flex justify-center my-5">
            <button class="btn-secondary">
                secondary
            </button>
        </div>
        <div class="w-full flex justify-center my-5">
            <button class="btn-accent">
                accent
            </button>
        </div> --}}
        <nav class="bg-white border-gray-200 dark:bg-gray-900">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="https://flowbite.com/" class="flex items-center">
                <img src="https://flowbite.com/docs/images/logo.svg" class="h-8 mr-3" alt="Flowbite Logo" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Flowbite</span>
            </a>
            <div class="flex md:order-2">
                <button type="button" class="btn-primary">Login</button>
                <button data-collapse-toggle="navbar-cta" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-cta" aria-expanded="false">
                  <span class="sr-only">Open main menu</span>
                  <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                  </svg>
              </button>
            </div>
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-cta">
              <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <li>
                  <a href="#" class="block py-2 pl-3 pr-4 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500" aria-current="page">Home</a>
                </li>
                <li>
                  <a href="#" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">About</a>
                </li>
                <li>
                  <a href="#" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Services</a>
                </li>
                <li>
                  <a href="#" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Contact</a>
                </li>
              </ul>
            </div>
            </div>
          </nav>
    <main class=" bg-slate-600 container mx-auto p-5">
        <h2 class = "text-xl text-white">FORM</h2>
        <form class="form-primary">

            <div class="form-row">
                <input type="email" name="floating_email" id="floating_email" class="form-input peer" placeholder=" " required />
                <div class="form-label-input">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" d="M16.5 12a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zm0 0c0 1.657 1.007 3 2.25 3S21 13.657 21 12a9 9 0 10-2.636 6.364M16.5 12V8.25" />
                    </svg>
                    <label for="floating_email" >Email address</label>
                </div>
            </div>
            <div class="form-row">
                <input type="email" name="floating_email" id="floating_email" class="form-input peer" placeholder=" " required />
                <div class="form-label-input">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" d="M16.5 12a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zm0 0c0 1.657 1.007 3 2.25 3S21 13.657 21 12a9 9 0 10-2.636 6.364M16.5 12V8.25" />
                    </svg>
                    <label for="floating_email" >Email address</label>
                </div>
            </div>
            <div class="form-row">
                <input type="email" name="floating_email" id="floating_email" class="form-input peer" placeholder=" " required />
                <div class="form-label-input">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" d="M16.5 12a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zm0 0c0 1.657 1.007 3 2.25 3S21 13.657 21 12a9 9 0 10-2.636 6.364M16.5 12V8.25" />
                    </svg>
                    <label for="floating_email" >Email address</label>
                </div>
            </div>
            <div class="form-row">
                <input type="email" name="floating_email" id="floating_email" class="form-input peer" placeholder=" " required />
                <div class="form-label-input">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" d="M16.5 12a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zm0 0c0 1.657 1.007 3 2.25 3S21 13.657 21 12a9 9 0 10-2.636 6.364M16.5 12V8.25" />
                    </svg>
                    <label for="floating_email" >Email address</label>
                </div>
            </div>
            
            <button class="btn-primary">Button</button>
            </form>

        <h2 class = "text-xl text-white">CHECKBOX</h2>
        <div class="flex items-center mb-4">
            <input id="default-checkbox" type="checkbox" value="" class="checkbox">
            <label for="default-checkbox" class="checkbox-label">Default checkbox</label>
        </div>
        <div class="flex items-center">
            <input checked id="checked-checkbox" type="checkbox" value="" class="checkbox">
            <label for="checked-checkbox" class="checkbox-label">Checked state</label>
        </div>

        <h2 class = "text-xl text-white">SELECT</h2>
        <label for="countries" class="select-label">Select an option</label>
        <select id="countries" class="select">
            <option selected>Choose a country</option>
            <option value="US">United States</option>
            <option value="CA">Canada</option>
            <option value="FR">France</option>
            <option value="DE">Germany</option>
        </select>

        <div class ="py-4">
            <h2 class = "text-xl text-white">CARDS</h2>

            <div class="flex justify-between">
                <a href="#" class="card-body">
                    <h5 class="card-title">Noteworthy technology acquisitions 2021</h5>
                    <p class="card-desc">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
                </a>
                <a href="#" class="card-body">
                    <h5 class="card-title">Noteworthy technology acquisitions 2021</h5>
                    <p class="card-desc">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
                </a>
                <a href="#" class="card-body">
                    <h5 class="card-title">Noteworthy technology acquisitions 2021</h5>
                    <p class="card-desc">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
                </a>
            </div>
        </div>

            <div class="flex justify-center">
                <div class="card-img-body max-w-sm">
                <img class="rounded-t-lg w-full" src="https://picsum.photos/300/200"/>
                <div class="p-5">
                    <a href="#">
                        <h5 class="card-title">Noteworthy technology acquisitions 2021</h5>
                    </a>
                    <p class="card-desc">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
                    
                </div>
            </div>





            
        </div>
        
        
          

    </main>
@endsection