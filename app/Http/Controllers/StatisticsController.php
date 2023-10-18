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
        
        $developer = Developer::where('user_id', '=', $devId)->with('messages', 'reviews', 'votes')->first();
        
        return view ('dashboard.statistics', compact('developer'));
    }

    public function graphData($id){
        // $user = Auth::id();
        // dd($user);
        $developer = Developer::where('user_id', '=', $id)->with('messages', 'reviews', 'votes')->first();
        
        return response()->json([
            'success' => 'true',
            'results' => [
                'messages' => $developer->messages,
                'reviews' => $developer->reviews,
                'votes' => $developer->votes
            ]   
        ]);
    }
}
