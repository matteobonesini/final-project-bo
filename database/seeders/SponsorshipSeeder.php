<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Models\Sponsorship;


class SponsorshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::withoutForeignKeyConstraints(function () {
            Sponsorship::truncate();
        });

        $tiers = [
            [
                "name" => "Tier 1",
                "price"=> 2.99,
                "duration"=> 24
            ],
            [
                "name"=> "Tier 2",
                "price"=> 5.99,
                "duration"=> 72
            ],
            [
                "name"=> "Tier 3",
                "price"=> 9.99,
                "duration"=> 144
            ]
        ];
        
        foreach ($tiers as $tier) {
            $sponsorship = new Sponsorship();
            $sponsorship->name = $tier["name"];
            $sponsorship->price = $tier["price"];
            $sponsorship->duration = $tier["duration"];
            $sponsorship->save();
        }
        
    }
}