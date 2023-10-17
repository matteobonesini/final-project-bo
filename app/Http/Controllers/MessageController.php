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

        /* $developers = Developer::where('phone_number', '=', '3528230141')->get();
        dd($developers); */

        $developers = Developer::all();
        $developer = NULL;
        foreach ($developers as $singleDeveloper) {
            if($singleDeveloper->user_id == $devId) {
                $developer = $singleDeveloper;
            }
        }

        /* $developer = Developer::find($devId);
        dd($developer); */

        return view('dashboard.messages', compact('developer'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(StoreMessageRequest $request)
    // {
    //     $formData = $request->validated();
    //     $message = Message::create($formData);
    //     $message->save();

    //     return redirect()->route('dashboard.messages');
    // }

    /**
     * Display the specified resource.
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMessageRequest $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Message $message)
    {
        //
    }
}
