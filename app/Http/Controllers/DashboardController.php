<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Models
use App\Models\Developer;

// Facades
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $devId = Auth::id();
        $developer = Developer::where('user_id', '=', $devId)->with('reviews', 'messages', 'votes')->first();
        if(isset($developer)) {
            $messages = $developer->messages->sortByDesc('id')->take(5)->values();
            $votes = $developer->votes->sort(function($a, $b) {
                if($a->pivot->id > $b->pivot->id) {
                    return -1;
                } elseif($a->pivot->id < $b->pivot->id) {
                    return 1;
                } else {
                    return 0;
                }
            })->take(5)->values();
            $reviews = $developer->reviews->sortByDesc('id')->take(5)->values(); 
            return view ('dashboard.dashboard', compact('developer', 'messages', 'votes', 'reviews'));
        } else {
            return view ('dashboard.dashboard', compact('developer'));
        }

    }
}