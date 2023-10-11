@extends('layouts.app')

@section('main-content')
    DASHBOARD
   
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

    <main class=" bg-slate-600 container mx-auto p-5">
        
        <div class="flex items-center mb-4">
            <input id="default-checkbox" type="checkbox" value="" class="checkbox">
            <label for="default-checkbox" class="checkbox-label">Default checkbox</label>
        </div>
        <div class="flex items-center">
            <input checked id="checked-checkbox" type="checkbox" value="" class="checkbox">
            <label for="checked-checkbox" class="checkbox-label">Checked state</label>
        </div>

        
        <label for="countries" class="select-label">Select an option</label>
        <select id="countries" class="select">
            <option selected>Choose a country</option>
            <option value="US">United States</option>
            <option value="CA">Canada</option>
            <option value="FR">France</option>
            <option value="DE">Germany</option>
        </select>


    </main>
@endsection