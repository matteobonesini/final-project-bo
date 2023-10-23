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
        $data = config('data');
        
        Schema::withoutForeignKeyConstraints(function () {
            Message::truncate();
        });

        $count = count($data);
        for ($i=1; $i <= $count; $i++) { 
            for ($j=0; $j < rand(5, 20); $j++) { 
                $message = new Message();
                $message->developer_id = $i;
                $message->name = fake()->name;
                $message->email = fake()->email;
                $message->title = fake()->catchPhrase;
                $message->content = fake()->sentence(20);
                $message->created_at = fake()->dateTimeThisDecade();
                $message->updated_at = $message->created_at;
                $message->save();
            }
        }
    }
}
