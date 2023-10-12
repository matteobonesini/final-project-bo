<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Model
use App\Models\Message;

class ReviewController extends Controller
{
    public function index()
    {
        $message = Message::all();
        return response()->json([
            'success' => 'true',
            'result' => $message
        ]);
    }
}
