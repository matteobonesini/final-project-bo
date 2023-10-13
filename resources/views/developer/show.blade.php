@extends('layouts.app')

@section('main-content')
    <main>
        <ul>
            <li>
                Id: {{ $developer->id }}
            </li>
            <li>
                Name: {{ $developer->user->name }}
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
            <li class="my-5">
                <h2 class="text-green-500">Messages:</h2>
                <ul>
                    @foreach ($developer->messages as $message)
                        <li>
                            <h3>{{ $message->name }}</h3>
                            <p class="ms-5">{{ $message->content }}</p>
                        </li>
                    @endforeach
                </ul>
            </li>
            <li class="my-5">
                <h2 class="text-green-500">Votes:</h2>
                <ul>
                    @foreach ($developer->votes as $vote)
                        <li>
                            <h3>{{ $vote->name }}</h3>
                        </li>
                    @endforeach
                </ul>
            </li>
            <li class="my-5">
                <h2 class="text-green-500">Reviews:</h2>
                <ul>
                    @foreach ($developer->reviews as $review)
                        <li>
                            <h3>{{ $review->customer_name }}</h3>
                        </li>
                    @endforeach
                </ul>
            </li>
            <li class="my-5">
                <h2 class="text-green-500">Sponsorships:</h2>
                <ul>
                    @foreach ($developer->sponsorships as $sponsorship)
                        <li>
                            <h3>{{ $sponsorship->name }}</h3>
                        </li>
                    @endforeach
                </ul>
            </li>
        </ul>
    </main>
@endsection