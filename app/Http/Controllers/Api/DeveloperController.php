<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Developer;
use Illuminate\Http\Request;

class DeveloperController extends Controller
{
    public function index() {
        $developers = Developer::paginate(6);

        return response()->json([
            'success' => true,
            'result' => $developers
        ]); 
    }

    public function show(string $id) {
        $developer = Developer::where('id', $id)->with('user')->first();

        if ($developer) {
            return response()->json([
                'success' => true,
                'results' => $developer
            ], 200);
        }
        else {
            return response()->json([
                'success' => false,
                'message' => 'Not found'
            ], 404);
        }
    }
}
