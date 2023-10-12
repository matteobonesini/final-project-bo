<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use App\Http\Requests\StoreDeveloperRequest;
use App\Http\Requests\UpdateDeveloperRequest;
use App\Models\Sponsorship;
use App\Models\WorkField;

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
    public function store(StoreDeveloperRequest $request)
    {
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
    }

    /**
     * Display the specified resource.
     */
    public function show(Developer $developer)
    {
         return view('developer.show', compact('developer'));
        // return response()->json($developer);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Developer $developer)
    {
        $sponsorships = Sponsorship::all();
        $work_fields = WorkField::all();

        return view('developer.edit', compact('developer', 'sponsorships', 'work_fields'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDeveloperRequest $request, Developer $developer)
    {
        $data = $request->validated();

        $updatedDeveloper = Developer::findOrFail($developer->id);
        $updatedDeveloper->update($data);

        if(isset($data['sponsorships'])) {
            $updatedDeveloper->sponsorships()->sync($data['sponsorships']);
        } else {
            $updatedDeveloper->sponsorship()->detach();
        }

        if(isset($data['work_fileds'])) {
            $updatedDeveloper->work_fileds()->sync($data['work_fileds']);
        } else {
            $updatedDeveloper->work_fileds()->detach();
        }

        return redirect()->route('developer.show', ['developer' => $updatedDeveloper->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Developer $developer)
    {
        Developer::findOrFail($developer->id)->delete();
        return redirect()->route('dashboard');
    }
}
