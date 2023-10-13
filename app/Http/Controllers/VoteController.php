<?php

namespace App\Http\Controllers;
use App\Models\Vote;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    public function index()
    {
        $vote = Vote::all();
        return view('dashboard.reviews');
    }   
}
