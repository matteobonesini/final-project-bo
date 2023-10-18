@extends('layouts.guest')

@section('main-content')
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class = "form-container">

            @if ($errors->any())
                <div class="alert alert-error">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>- {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Name -->
            <div>
                <label class = "form-label" for="name"><span class = "text-red-500">*</span>Nome Cognome</label>
                <input placeholder="Name..." id="name" class="form-input" type="text" name="name" value="{{ old('name') }}" required autofocus/>
            </div>
    
            <!-- Email Address -->
            <div class="mt-4">
                <label class = "form-label" for="email"><span class = "text-red-500">*</span>Email</label>
                <input placeholder="example@email.com" id="email" class="form-input" type="email" name="email" value="{{ old('email') }}" required/>
            </div>
    
            <!-- Password -->
            <div class="mt-4">
                <label class = "form-label" for="password" value="{{ old('password') }}"><span class = "text-red-500">*</span>Password</label>
    
                <input id="password" class="form-input"
                                type="password"
                                name="password"
                                required />
            </div>
    
            <!-- Confirm Password -->
            <div class="mt-4">
                <label class = "form-label" for="password_confirmation" value="{{ old('password_confirmation') }}"><span class = "text-red-500">*</span>Conferma Password</label>
    
                <input id="password_confirmation" class="form-input"
                                type="password"
                                name="password_confirmation" required />
            </div>
        </div>

        <div class="flex items-center  justify-between mt-8">
            <a class="btn-accent" href="{{ route('login') }}">
                {{ __('Già registrato?') }}
            </a>

            <button class="btn-primary">
                {{ __('Registrati') }}
            </button>
        </div>
    </form>
@endsection

