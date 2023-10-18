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
}
