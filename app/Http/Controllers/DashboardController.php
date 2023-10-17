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
        // $developer = Developer::where('user_id', '=', $devId)->with('messages', 'reviews', 'votes')->get();
        $developer = Developer::where('user_id', '=', $devId)->first();

        $reviews = Developer::where('user_id', '=', $devId)->first()->reviews;
        $messages = Developer::where('user_id', '=', $devId)->first()->messages;
        $votes = Developer::where('user_id', '=', $devId)->first()->votes;

        return view ('dashboard.dashboard', compact('developer', 'reviews', 'messages', 'votes'));
    }
}