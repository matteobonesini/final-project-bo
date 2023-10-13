@extends('layouts.app')

@section('main-content')
    <main>
        <div class="container mx-auto my-5">
            <h3 class="mb-8">{{ $developer->user->name }}</h3>
            <form action="{{ route('developer.update', ['developer' => $developer->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- Experience Year --}}
                <div class="form-row">
                    <input type="number" name="experience_year" id="experience_year" class="form-input peer" placeholder=" " required value="{{ old('experience_year', $developer->experience_year) }}"/>
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
                        <label for="curriculum" >Anni di Esperienza</label>
                    </div>
                    @if ($developer->curriculum)
                        <div class="form-check">
                            <input class="checkbox" type="checkbox" value="1" name="remove_curriculum" id="remove_curriculum">
                            <label class="checkbox-label" for="remove_curriculum">
                                Rimuovi immagine
                            </label>
                        </div>
                    @endif
                </div>

                {{-- Profile Picture --}}
                <div class="form-row">
                    <input type="file" name="profile_picture" id="profile_picture" class="form-input peer"/>
                    <div class="form-label-input">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" d="M16.5 12a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zm0 0c0 1.657 1.007 3 2.25 3S21 13.657 21 12a9 9 0 10-2.636 6.364M16.5 12V8.25" />
                        </svg>
                        <label for="profile_picture" >Anni di Esperienza</label>
                    </div>
                    @if ($developer->profile_picture)
                        <div>
                            <img src="{{ $developer->full_img_src }}" class="w-50" alt="{{ $developer->user->name }}">
                        </div>
                        <div class="form-check">
                            <input class="checkbox" type="checkbox" value="1" name="remove_profile_picture" id="remove_profile_picture">
                            <label class="checkbox-label" for="remove_profile_picture">
                                Rimuovi immagine
                            </label>
                        </div>
                    @endif
                </div>
                
                {{-- Profile Description --}}
                <div class="form-row">
                    <textarea id="profile_description" name="profile_description" class="form-input peer" rows="4" cols="50">{{ old('profile_description', $developer->profile_description) }}"</textarea>
                    <div class="form-label-input">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" d="M16.5 12a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zm0 0c0 1.657 1.007 3 2.25 3S21 13.657 21 12a9 9 0 10-2.636 6.364M16.5 12V8.25" />
                        </svg>
                        <label for="phone_number" >Numero di Telefono</label>
                    </div>
                </div>

                {{-- Address --}}
                <div class="form-row">
                    <input type="text" name="address" id="address" class="form-input peer" placeholder=" " required value="{{ old('address', $developer->address) }}"/>
                    <div class="form-label-input">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" d="M16.5 12a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zm0 0c0 1.657 1.007 3 2.25 3S21 13.657 21 12a9 9 0 10-2.636 6.364M16.5 12V8.25" />
                        </svg>
                        <label for="address" >Indirizzo</label>
                    </div>
                </div>

                {{-- Phone Number --}}
                <div class="form-row">
                    <input type="text" name="phone_number" id="phone_number" class="form-input peer" placeholder=" " required value="{{ old('phone_number', $developer->phone_number) }}"/>
                    <div class="form-label-input">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" d="M16.5 12a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zm0 0c0 1.657 1.007 3 2.25 3S21 13.657 21 12a9 9 0 10-2.636 6.364M16.5 12V8.25" />
                        </svg>
                        <label for="phone_number" >Numero di Telefono</label>
                    </div>
                </div>
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
            </form>
        </div>
  
    </main>
@endsection