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
                'userName' => 'Alice Johnson',
                'mail' => 'alice@email.com'
            ],
            [
                'userName' => 'Bob Smith',
                'mail' => 'bob@email.com'
            ],
            [
                'userName' => 'Carla Davis',
                'mail' => 'carla@email.com'
            ],
            [
                'userName' => 'Claudia Alves',
                'mail' => 'claudia@email.com'
            ],
            [
                'userName' => 'David Wilson',
                'mail' => 'david@email.com'
            ],
            [
                'userName' => 'Eva Martinez',
                'mail' => 'eva@email.com'
            ],
            [
                'userName' => 'Francesco Nunziatini',
                'mail' => 'francesco@email.com'
            ],
            [
                'userName' => 'Frank Johnson',
                'mail' => 'frank@email.com'
            ],
            [
                'userName' => 'Grace Lee',
                'mail' => 'grace@email.com'
            ],
            [
                'userName' => 'Hank Miller',
                'mail' => 'hank@email.com'
            ],
            [
                'userName' => 'Harper Russo',
                'mail' => 'harper@email.com'
            ],
            [
                'userName' => 'Irene Brown',
                'mail' => 'irene@email.com'
            ],
            [
                'userName' => 'Jack Davis',
                'mail' => 'jack@email.com'
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
            ],
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
