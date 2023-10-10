@extends('layouts.app')

@section('main-content')

    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <label for="email" :value="old('Email')">Email</label>
            <input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus/>
            {{-- <error :messages="$errors->get('email')" class="mt-2" /> --}}
        </div>

        <!-- Password -->
        <div class="mt-4">
            <label for="password" :value="old('Password')">Password</label>
            <input id="password" class="block mt-1 w-full" type="password" name="password" required/>
            {{-- <error :messages="$errors->get('password')" class="mt-2" /> --}}
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <label for="password_confirmation" :value="old('Confirm Password')">Confirm password</label>

            <input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required/>

            {{-- <error :messages="$errors->get('password_confirmation')" class="mt-2" /> --}}
        </div>

        <div class="flex items-center justify-end mt-4">
            <button>
                {{ __('Reset Password') }}
            </button>
        </div>
    </form>

@endsection
