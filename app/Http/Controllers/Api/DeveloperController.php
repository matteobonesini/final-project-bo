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
    // return all type of work field
    public function work_fields() {
        $work_fields = WorkField::all();

        return response()->json([
            'success' => true,
            'results' => $work_fields
        ]); 
    }

    // return all type of votes
    public function votes() {
        $votes = Vote::all();

        return response()->json([
            'success' => true,
            'results' => $votes
        ]); 
    }

    public function search(string $search, string $vote = 'null', string $review = 'null') {

        $allDevelopers = Developer::where('id', '!=', null)->with('user', 'reviews', 'work_fields')->get();

        $developers = [];

        foreach ($allDevelopers as $singleDeveloper) {
            foreach ($singleDeveloper->work_fields as $singleWorkField) {
                if($singleWorkField->id == $search && $vote == 'null' && $review == 'null') {
                    $developers[] = $singleDeveloper;
                } elseif($singleWorkField->id == $search && $vote != 'null' && $review == 'null') {
                    if($singleDeveloper->average_vote >= (int)$vote)
                        $developers[] = $singleDeveloper;
                } elseif($singleWorkField->id == $search && $vote == 'null' && $review != 'null') {
                    if(count($singleDeveloper->reviews) >= (int)$review)
                        $developers[] = $singleDeveloper;
                } elseif($singleWorkField->id == $search && $vote != 'null' && $review != 'null') {
                    if($singleDeveloper->average_vote >= (int)$vote) {
                        if(count($singleDeveloper->reviews) >= (int)$review)
                            $developers[] = $singleDeveloper;
                    }
                } elseif($search == 'null') {
                    $developers = [];
                    foreach ($allDevelopers as $singleDeveloper) {
                        if($singleDeveloper->active_sponsorship == true) {
                            $developers[] = $singleDeveloper;
                        }
                    }
                    shuffle($developers);
                    
                    $developers = array_slice($developers, 0, 4);
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
