<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReviewRequest;
use App\Http\Requests\UpdateReviewRequest;

// Facades
use Illuminate\Support\Facades\Auth;

// Models
use App\Models\Developer;
use App\Models\Review;
use App\Models\User;
use App\Models\Vote;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    public function compare($a, $b) {
        if($a->pivot->id > $b->pivot->id) {
            return -1;
        } elseif($a->pivot->id < $b->pivot->id) {
            return 1;
        } else {
            return 0;
        }
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $devId = User::findOrFail(Auth::id())->developer->user_id;
        $developer = Developer::where('user_id', '=', $devId)->first();
        $votes = $developer->votes->sort(function($a, $b) {
            if($a->pivot->id > $b->pivot->id) {
                return -1;
            } elseif($a->pivot->id < $b->pivot->id) {
                return 1;
            } else {
                return 0;
            }
        })->values();
        $reviews = $developer->reviews->sortKeysDesc()->values();

        return view ('dashboard.reviews', compact('developer', 'votes', 'reviews'));
    }
}
