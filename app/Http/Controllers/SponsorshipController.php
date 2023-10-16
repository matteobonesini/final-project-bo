<?php

namespace App\Http\Controllers;

use App\Models\Sponsorship;


class SponsorshipController extends Controller
{
    public function index()
    {
        $sponsorships = Sponsorship::all();
        return view('developer.edit', compact("sponsorships"));
    }
}
