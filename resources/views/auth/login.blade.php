@extends('layouts.guest')

@section('main-content')

    <form method="POST" action="{{ route('login') }}">
        @csrf

        @if ($errors->any())
            <div class="alert alert-error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>- {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class = "form-container">
            <!-- Email Address -->
            <div>
                <label for="email" class="form-label"><span class = "text-red-500">*</span>Email</label>
                <input type="email" id="email" name="email" class="form-input @error('email') is-invalid @enderror" placeholder="example@email.com" value="{{ old('email') }}" required>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <label for="password" class="form-label"><span class = "text-red-500">*</span>Password</label>
                <input type="password" id="password" name="password" class="form-input @error('password') is-invalid @enderror" placeholder="Password" value="{{ old('password') }}" required>
            </div>

            <!-- Remember Me -->
            <div class="mt-4 flex items-center gap-2">
                <label for="remember_me" class="form-label m-0">
                    Ricordami
                </label>
                <input id="remember_me" type="checkbox" class="checkbox" name="remember" value="{{ old('remember') }}">
            </div>
        </div>
        
        <div class="flex flex-col-reverse md:flex-row md:items-center justify-start justify-between space-y-5 md:space-y-0 space-y-reverse mt-5">
            @if (Route::has('password.request'))
                <a class="btn-accent" href="{{ route('password.request') }}">
                    {{ __('Hai dimenticato la password?') }}
                </a>
            @endif
            <button class="btn-primary">Log in</button>
        </div>
    </form>
    
@endsection