<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Http\Requests\StoreMessageRequest;
use App\Http\Requests\UpdateMessageRequest;
use App\Models\Developer;

//Controllers

// Facades 
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $devId = Auth::id();
        $developer = Developer::where('user_id', '=', $devId)->with('messages')->first();
        $messages = $developer->messages->sortByDesc('id')->values(); 
        
        return view('dashboard.messages', compact('developer', 'messages'));
    }
}
