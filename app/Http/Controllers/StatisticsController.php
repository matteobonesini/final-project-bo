<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Models
use App\Models\Developer;

// Facades
use Illuminate\Support\Facades\Auth;

class StatisticsController extends Controller
{
    public function index(){
        $devId = Auth::id();
        $developer = Developer::where('user_id', '=', $devId)->with('messages', 'reviews', 'votes')->get();
        
        return view ('dashboard.statistics', compact('developer'));
    }
}
