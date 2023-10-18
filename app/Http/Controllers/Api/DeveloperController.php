<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Developer;
use App\Models\User;
use App\Models\Vote;
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

    public function votes() {
        $votes = Vote::all();

        return response()->json([
            'success' => true,
            'results' => $votes
        ]); 
    }

    public function search(string $search) {
        $allDevelopers = Developer::where('id', '!=', null)->with('user', 'reviews', 'work_fields')->get();

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
            'results' => $developers
        ]); 
    }

    public function show(string $id) {
        $developer = Developer::where('id', $id)->with('user', 'reviews', 'work_fields')->first();

        $activeSponsorship = false;
        if(count($developer->sponsorships) > 0) {
            $expireDate = $developer->sponsorships[count($developer->sponsorships) - 1]->pivot->expire_date;
            $activeSponsorship = strtotime($expireDate) > time();
        }

        if ($developer) {
            return response()->json([
                'success' => true,
                'result' => $developer,
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
