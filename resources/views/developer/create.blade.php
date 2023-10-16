@extends('layouts.app')

@section('main-content')
<main>
    <div class="container mx-auto my-5 px-4">
        <h3 class="mb-8 text-4xl font-bold text-center">{{ Auth::user()->name }}</h3>
        @if ($errors->any())
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                Errori:
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('developer.store') }}" method="post" enctype="multipart/form-data">
            @csrf


            {{-- Experience Year --}}
            <div class="form-row">
                <input type="number" name="experience_year" id="experience_year" class="form-input peer" placeholder=" " required value="{{ old('experience_year') }}"/>
                <div class="form-label-input">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" d="M16.5 12a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zm0 0c0 1.657 1.007 3 2.25 3S21 13.657 21 12a9 9 0 10-2.636 6.364M16.5 12V8.25" />
                    </svg>
                    <label for="experience_year" >Anni di Esperienza</label>
                </div>
            </div>

            {{-- Curriculum --}}
            <div class="form-row">
                <input type="file" name="curriculum" id="curriculum" class="form-input peer"/>
                <div class="form-label-input">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" d="M16.5 12a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zm0 0c0 1.657 1.007 3 2.25 3S21 13.657 21 12a9 9 0 10-2.636 6.364M16.5 12V8.25" />
                    </svg>
                    <label for="curriculum" >Curriculum</label>
                </div>
            </div>

            {{-- Profile Picture --}}
            <div class="form-row">
                <input type="file" name="profile_picture" id="profile_picture" class="form-input peer"/>
                <div class="form-label-input">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" d="M16.5 12a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zm0 0c0 1.657 1.007 3 2.25 3S21 13.657 21 12a9 9 0 10-2.636 6.364M16.5 12V8.25" />
                    </svg>
                    <label for="profile_picture" >Profile Picture</label>
                </div>
            </div>
            
            {{-- Profile Description --}}
            <div class="form-row">
                <textarea id="profile_description" name="profile_description" class="form-input peer" rows="4" cols="50">{{ old('profile_description') }}</textarea>
                <div class="form-label-input">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" d="M16.5 12a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zm0 0c0 1.657 1.007 3 2.25 3S21 13.657 21 12a9 9 0 10-2.636 6.364M16.5 12V8.25" />
                    </svg>
                    <label for="phone_number" >Numero di Telefono</label>
                </div>
            </div>

            {{-- Address --}}
            <div class="form-row">
                <input type="text" name="address" id="address" class="form-input peer" placeholder=" " required value="{{ old('address') }}"/>
                <div class="form-label-input">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" d="M16.5 12a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zm0 0c0 1.657 1.007 3 2.25 3S21 13.657 21 12a9 9 0 10-2.636 6.364M16.5 12V8.25" />
                    </svg>
                    <label for="address" >Indirizzo</label>
                </div>
            </div>

            {{-- Phone Number --}}
            <div class="form-row">
                <input type="text" name="phone_number" id="phone_number" class="form-input peer" placeholder=" " required value="{{ old('phone_number') }}"/>
                <div class="form-label-input">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" d="M16.5 12a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zm0 0c0 1.657 1.007 3 2.25 3S21 13.657 21 12a9 9 0 10-2.636 6.364M16.5 12V8.25" />
                    </svg>
                    <label for="phone_number" >Numero di Telefono</label>
                </div>
            </div>

            {{-- Work Fields --}}
            <h4 class="mb-2">Work Fields: </h4>
            <div class="form-row">
                <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
                    @foreach ($work_fields as $work_field)
                        <div class="flex items-center mb-4">
                            <input name="work_fields[]" id="work_fiels" type="checkbox" value="{{ $work_field->id }}" class="checkbox">
                            <label for="work_fields" class="checkbox-label">{{ $work_field->name }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
            <button type="submit" class="btn-primary">Crea</button>
        </form>
    </div>
</main>
@endsection