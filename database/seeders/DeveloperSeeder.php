<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

use App\Models\Developer;

class DeveloperSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::withoutForeignKeyConstraints(function () {
            Developer::truncate();
        });
        
        $imgs = Storage::files("uploads/imgs");
        $curriculums = Storage::files("uploads/curriculums");

        for ($i=0; $i < 10; $i++) { 
            $developer = new Developer();
            $developer->user_id = $i+1;
            $developer->experience_year = rand(0, 20);
            $developer->address = fake()->streetAddress;
            $developer->profile_picture =  $imgs[$i];
            $developer->curriculum = $curriculums[$i];
            $developer->profile_description = fake()->sentence(20);
            $developer->phone_number = rand(3000000001, 3999999999);
            $developer->save();
        }
        
        


    }
}
