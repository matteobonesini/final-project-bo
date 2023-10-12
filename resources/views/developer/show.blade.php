@extends('layouts.app')

@section('main-content')
    <main>
        <ul>
            <li>
                id: {{ $developer->id }}
            </li>
            <li>
                experience_year: {{ $developer->experience_year }}
            </li>
            <li>
                profile_description: {{ $developer->profile_description }}
            </li>
            <li>
                <img src="{{ $developer->full_img_src }}" alt="{{ $developer->user->name }}">
            </li>
        </ul>
    </main>
@endsection