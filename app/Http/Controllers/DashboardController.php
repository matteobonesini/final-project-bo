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

        return view ('dashboard.dashboard', compact('developer'));
    }
}