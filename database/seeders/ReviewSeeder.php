<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

use App\Models\Review;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::withoutForeignKeyConstraints(function () {
            Review::truncate();
        });

        for ($i=0; $i < 10; $i++) { 
            $review = new Review();
            $review->developer_id = rand(1, 10);
            $review->customer_name = fake()->name;
            $review->description = fake()->sentence(20);
            $review->save();
        }
    }
}
