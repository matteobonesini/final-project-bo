<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Models\Vote;

class VoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::withoutForeignKeyConstraints(function () {
            Vote::truncate();
        });

        $votes = [
            [
                "name" => "Terribile",
                "value" => "1"
            ],
            [
                "name" => "Pessimo",
                "value" => "2"
            ],
            [
                "name" => "Scadente",
                "value" => "3"
            ],
            [
                "name" => "Mediocre",
                "value" => "4"
            ],
            [
                "name" => "Accettabile",
                "value" => "5"
            ],
            [
                "name" => "Buono",
                "value" => "6"
            ],
            [
                "name" => "Ottimo",
                "value" => "7"
            ],
            [
                "name" => "Eccellente",
                "value" => "8"
            ],
            [
                "name" => "Straordinario",
                "value" => "9"
            ],
            [
                "name" => "Eccezzionale",
                "value" => "10"
            ],
        ];

        foreach ($votes as $singleVote) {
            $vote = new Vote();
            $vote->name = $singleVote["name"];
            $vote->value = $singleVote["value"];
            $vote->save();
        }
        
    }
}
