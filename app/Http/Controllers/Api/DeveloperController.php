<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Developer;
use App\Models\User;
use App\Models\WorkField;
use Illuminate\Http\Request;

class DeveloperController extends Controller
{
    public function work_fields() {
        $work_fields = WorkField::all();

        return response()->json([
            'success' => true,
            'results' => $work_fields
        ]); 
    }

    public function search(string $search) {
        $allDevelopers = Developer::where('id', '!=', null)->with('work_fields', 'user')->get();

        $developers = [];

        foreach ($allDevelopers as $singleDeveloper) {
            foreach ($singleDeveloper->work_fields as $wf) {
                if($wf->id == $search) {
                    $developers[] = $singleDeveloper;
                }
            }
        }
        
        return response()->json([
            'success' => true,
            'developers' => $developers
        ]); 
    }

    public function show(string $id) {
        $developer = Developer::where('id', $id)->with('user', 'reviews')->first();

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
