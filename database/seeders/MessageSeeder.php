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

        for ($i=0; $i < 10; $i++) { 
            $message = new Message();
            $message->developer_id = rand(1, 10);
            $message->name = fake()->name;
            $message->email = fake()->email;
            $message->title = fake()->catchPhrase;
            $message->content = fake()->sentence(20);
            $message->save();
        }
    }
}
