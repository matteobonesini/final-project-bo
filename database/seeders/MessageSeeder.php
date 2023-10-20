<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

use App\Models\Message;

class MessageSeeder extends Seeder
{
    public function run(): void
    {
        Schema::withoutForeignKeyConstraints(function () {
            Message::truncate();
        });

        $url = 'https://randomuser.me/api/?results='.config('data');
        $data = json_decode(file_get_contents($url), true);
        $data = $data['results'];

        $count = count($data);
        for ($i=1; $i <= $count; $i++) { 
            for ($j=0; $j < rand(5, 20); $j++) { 
                $message = new Message();
                $message->developer_id = $i;
                $message->name = fake()->name;
                $message->email = fake()->email;
                $message->title = fake()->catchPhrase;
                $message->content = fake()->sentence(20);
                $message->save();
            }
        }
    }
}
