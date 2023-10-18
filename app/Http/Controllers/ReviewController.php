<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReviewRequest;
use App\Http\Requests\UpdateReviewRequest;

// Facades
use Illuminate\Support\Facades\Auth;

// Models
use App\Models\Developer;
use App\Models\Review;
use App\Models\Vote;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $devId = Auth::id();
        $developer = Developer::where('user_id', '=', $devId)->first();
        $reviews = Review::where('developer_id', '=', $devId)->get();
        $votes = Vote::all();

        return view ('dashboard.reviews', compact('reviews', 'votes', 'developer'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(StoreReviewRequest $request)
    // {
    //     $formData = $request->validated();
    //     $review = Review::create($formData);
    //     $review->save();

    //     return redirect()->route('dashboard.reviews');
    // }

    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReviewRequest $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        //
    }
}
