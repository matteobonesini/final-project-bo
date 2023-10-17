@extends('layouts.guest')

@section('main-content')
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class = "form-container">
            <div>
                <label class = "form-label" for="name"><span class = "text-red-500">*</span>Name</label>
                <input placeholder="Name..." id="name" class="form-input" type="text" name="name" value="{{ old('name') }}" required autofocus/>
                {{-- <error messages="$errors->get('name')" class="mt-2" /> --}}
            </div>
    
            <!-- Email Address -->
            <div class="mt-4">
                <label class = "form-label" for="email"><span class = "text-red-500">*</span>Email</label>
                <input placeholder="example@email.com" id="email" class="form-input" type="email" name="email" value="{{ old('email') }}" required/>
                {{-- <x-input-error messages="$errors->get('email')" class="mt-2" /> --}}
            </div>
    
            <!-- Password -->
            <div class="mt-4">
                <label placeholder="********" class = "form-label" for="password" value="{{ old('password') }}"><span class = "text-red-500">*</span>Password</label>
    
                <input id="password" class="form-input"
                                type="password"
                                name="password"
                                required />
    
                {{-- <error messages="$errors->get('password')" class="mt-2" /> --}}
            </div>
    
            <!-- Confirm Password -->
            <div class="mt-4">
                <label placeholder="********" class = "form-label" for="password_confirmation" value="old('Confirm Password')"><span class = "text-red-500">*</span>Confirm Password</label>
    
                <input id="password_confirmation" class="form-input"
                                type="password"
                                name="password_confirmation" required />
    
                {{-- <error messages="$errors->get('password_confirmation')" class="mt-2" /> --}}
            </div>
        </div>
        <!-- Name -->
        

        <div class="flex items-center  justify-between py-8">
            <a class="btn-accent" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <button class="btn-primary">
                {{ __('Register') }}
            </button>
        </div>
    </form>
@endsection

