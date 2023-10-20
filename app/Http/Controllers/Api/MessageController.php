<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMessageRequest;

// Model
use App\Models\Message;

class MessageController extends Controller
{
    public function send(StoreMessageRequest $request)
    {
        $data = $request->validated();

        Message::create($data);
        return response()->json([
            'success' => true,
            'result' => $data,
        ], 200);
    }
}
