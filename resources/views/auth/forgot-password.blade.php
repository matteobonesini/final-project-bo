@extends('layouts.guest')

@section('main-content')
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    @if ($errors->any())
        <div class="alert alert-error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>- {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class = "form-container">
            <!-- Email Address -->
            <div>
                <label for="email" class="form-label"><span class = "text-red-500">*</span>Email</label>
                <input type="email" id="email" name="email" class="form-input @error('email') is-invalid @enderror" placeholder="example@email.com" value="{{ old('email') }}" required>
            </div>
        </div>
        
        <div class="flex items-center justify-end mt-8">
            <button class="btn-primary">Email Password Reset Link</button>
        </div>

    </form>
@endsection
