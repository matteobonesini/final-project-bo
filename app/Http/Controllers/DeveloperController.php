<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use App\Http\Requests\StoreDeveloperRequest;
use App\Http\Requests\UpdateDeveloperRequest;
use App\Models\Sponsorship;
use App\Models\Vote;
use App\Models\WorkField;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DeveloperController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
            $sponsorships = Sponsorship::all();
            $work_fields = WorkField::all();

            return view('developer.create', compact('sponsorships', 'work_fields'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDeveloperRequest $request, Developer $developer)
    {
        if(Auth::id() === $developer->id){ 
            $data = $request->validated();

            $newDeveloper = Developer::create($data);

            if(isset($data['sponsorships'])) {
                foreach ($data['sponsorships'] as $sponsorship) {
                    $newDeveloper->sponsorships()->attach($sponsorship);
                }
            }

            if(isset($data['work_fields'])) {
                foreach ($data['work_fields'] as $work_field) {
                    $newDeveloper->work_fiels()->attach($work_field);
                }
            }

            return redirect()->route('developer.show', ['developer' => $newDeveloper->id]);
        } else {
            abort(404);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Developer $developer)
    {
        if(Auth::id() === $developer->id){
            $voteArr = [];
            foreach ($developer->votes as $vote) {
                $voteArr[] = $vote->value;
            }
            if (count($voteArr) != 0) {
                $avgVote =  array_sum($voteArr)/count($voteArr);
            } else {
                $avgVote = 0;
            }
            return view('developer.show', compact('developer', 'avgVote'));
        } else {
            abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Developer $developer)
    {
        if(Auth::id() === $developer->id){
            $sponsorships = Sponsorship::all();
            $work_fields = WorkField::all();

            return view('developer.edit', compact('developer', 'sponsorships', 'work_fields'));
        } else {
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDeveloperRequest $request, Developer $developer)
    {
        $data = $request->validated();

        $crlmPath = $developer->curriculum;
        if (isset($data['curriculum'])) {
            if ($developer->curriculum) {
                Storage::delete($developer->curriculum);
            }
            $crlmPath = Storage::put('uploads/curriculums', $data['curriculum']);
        }
        else if (isset($data['remove_curriculum'])) {
            if ($developer->curriculum) {
                Storage::delete($developer->curriculum);
            }
            $crlmPath = null;
        }

        $imgPath = $developer->profile_picture;
        if (isset($data['profile_picture'])) {
            if ($developer->profile_picture) {
                Storage::delete($developer->profile_picture);
            }
            $imgPath = Storage::put('uploads/imgs', $data['profile_picture']);
        }
        else if (isset($data['remove_profile_picture'])) {
            if ($developer->profile_picture) {
                Storage::delete($developer->profile_picture);
            }
            $imgPath = null;
        }

        $updatedDeveloper = Developer::findOrFail($developer->id);
        $updatedDeveloper->update([
            'experience_year' => $data['experience_year'],
            'curriculum' => $crlmPath,
            'profile_picture' => $imgPath,
            'profile_description' => $data['profile_description'],
            'address' => $data['address'],
            'phone_number' => $data['phone_number']
        ]);

        if(isset($data['sponsorships'])) {
            $updatedDeveloper->sponsorships()->sync($data['sponsorships']);
        } else {
            // $updatedDeveloper->sponsorships()->detach();
        }

        if(isset($data['work_fiels'])) {
            $updatedDeveloper->work_fiels()->sync($data['work_fiels']);
        } else {
            $updatedDeveloper->work_fiels()->detach();
        }

        return redirect()->route('developer.show', ['developer' => $updatedDeveloper->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Developer $developer)
    {
        //
    }
}
