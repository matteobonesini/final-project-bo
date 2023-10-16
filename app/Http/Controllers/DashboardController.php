<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Models
use App\Models\Developer;
use App\Models\Review;
use App\Models\Vote;

// Facades
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){

        $devId = Auth::id();
        $developer = Developer::find($devId);
        // $lastVotes = $developer->votes::where('developer_id', '=', $devId)->orderBy('id', 'desc')->limit(1)->get();
        // $lastVotes = $developer->votes->modelKeys();
        
        return view ('dashboard.dashboard', compact('developer'));
    }
}
