<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::withoutForeignKeyConstraints(function () {
            User::truncate();
        });

        $users = [
            [
                'userName' => 'claudia',
                'mail' => 'claudia@email.com'
            ],
            [
                'userName' => 'francesco',
                'mail' => 'francesco@email.com'
            ],
            [
                'userName' => 'harper',
                'mail' => 'harper@email.com'
            ],
            [
                'userName' => 'kim',
                'mail' => 'kim@email.com'
            ],
            [
                'userName' => 'loise',
                'mail' => 'loise@email.com'
            ],
            [
                'userName' => 'lorenzo',
                'mail' => 'lorenzo@email.com'
            ],
            [
                'userName' => 'pedro',
                'mail' => 'pedro@email.com'
            ],
            [
                'userName' => 'reese',
                'mail' => 'reese@email.com'
            ],
            [
                'userName' => 'samira',
                'mail' => 'samira@email.com'
            ],
            [
                'userName' => 'yuri',
                'mail' => 'yuri@email.com'
            ]
        ];

        foreach ($users as $user) {
            $newUser = new User();
            $newUser->name = $user['userName'];
            $newUser->email = $user['mail'];
            $newUser->password = Hash::make('password');
            $newUser->save();
        }
    }
}
