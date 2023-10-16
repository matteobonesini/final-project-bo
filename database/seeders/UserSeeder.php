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
                'userName' => 'Claudia Alves',
                'mail' => 'claudia@email.com'
            ],
            [
                'userName' => 'Francesco Nunziatini',
                'mail' => 'francesco@email.com'
            ],
            [
                'userName' => 'Harper Russo',
                'mail' => 'harper@email.com'
            ],
            [
                'userName' => 'Kim Chun Hei',
                'mail' => 'kim@email.com'
            ],
            [
                'userName' => 'Loise Chastain',
                'mail' => 'loise@email.com'
            ],
            [
                'userName' => 'Lorenzo Favaretto',
                'mail' => 'lorenzo@email.com'
            ],
            [
                'userName' => 'Pedro Fernandes',
                'mail' => 'pedro@email.com'
            ],
            [
                'userName' => 'Reese Miller',
                'mail' => 'reese@email.com'
            ],
            [
                'userName' => 'Samira Hadid',
                'mail' => 'samira@email.com'
            ],
            [
                'userName' => 'Yuri Montesi',
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
