@extends('layouts.guest')

@section('main-content')

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class = "form-container">

            <!-- Email Address -->
            <div class="mt-4">
                <label for="email" class="form-label"><span class = "text-red-500">*</span>Email</label>
                <input type="email" id="email" name="email" class="form-input" placeholder="example@email.com" value="{{ old('email') }}" required>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <label for="password" class="form-label"><span class = "text-red-500">*</span>Password</label>
                <input type="password" id="password" name="password" class="form-input" placeholder="Password" value="{{ old('password') }}" required>
            </div>

            <!-- Remember Me -->
            <div class="mt-4 flex gap-2">
                <label for="remember_me" class="form-label">
                    Remember Me
                </label>
                <input id="remember_me" type="checkbox" class="checkbox" name="remember" value="{{ old('remember') }}">
            </div>
        </div>
        
        <div class="flex items-center justify-between mt-4 py-8">
            @if (Route::has('password.request'))
                <a class="btn-accent" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
            <button class="btn-primary">Log in</button>
        </div>
    </form>
    
@endsection