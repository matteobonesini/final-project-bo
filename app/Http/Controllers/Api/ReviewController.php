<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReviewRequest;
use App\Models\Developer;
// Model
use App\Models\Review;

class ReviewController extends Controller
{
    public function send(StoreReviewRequest $request)
    {
        $data = $request->validated();

        Review::create($data);

        $developer = Developer::findOrFail($data['developer_id']);

        $developer->votes()->attach($data['vote']);

        return response()->json([
            'success' => true,
            'result' => $data,
        ], 200);
    }
}
