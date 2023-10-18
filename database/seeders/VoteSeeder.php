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
                "name" => "Mediocre",
                "value" => "2"
            ],
            [
                "name" => "Accettabile",
                "value" => "3"
            ],
            [
                "name" => "Buono",
                "value" => "4"
            ],
            [
                "name" => "Ottimo",
                "value" => "5"
            ]
        ];

        foreach ($votes as $singleVote) {
            $vote = new Vote();
            $vote->name = $singleVote["name"];
            $vote->value = $singleVote["value"];
            $vote->save();
        }
        
    }
}
