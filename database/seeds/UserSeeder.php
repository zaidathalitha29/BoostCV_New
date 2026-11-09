
<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'name' => 'Admin BoostCV',
                'email' => 'admin@boostcv.test',
                'role' => 'admin',
            ],
            [
                'name' => 'Creator Pertama',
                'email' => 'creator1@boostcv.test',
                'role' => 'creator',
            ],
            [
                'name' => 'Creator Kedua',
                'email' => 'creator2@boostcv.test',
                'role' => 'creator',
            ],
            [
                'name' => 'Customer Pertama',
                'email' => 'customer1@boostcv.test',
                'role' => 'customer',
            ],
        ];

        foreach ($users as $user) {
            DB::table('users')->updateOrInsert(
                ['email' => $user['email']],
                [
                    'name' => $user['name'],
                    'password' => Hash::make('password123'),
                    'role' => $user['role'],
                    'updated_at' => now(),
                    'created_at' => now(),
                ]
            );
        }
    }
}
