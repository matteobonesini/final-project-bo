@extends('layouts.app')

@section('main-content')

    <div class="mb-4 text-sm text-gray-600">
        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <!-- Password -->
        <div>
            <label for="password" :value="__('Password')">Password</label>

            <input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required />

            {{-- <x-input-error :messages="$errors->get('password')" class="mt-2" /> --}}
        </div>

        <div class="flex justify-end mt-4">
            <button>
                {{ __('Confirm') }}
            </button>
        </div>
    </form>

@endsection

