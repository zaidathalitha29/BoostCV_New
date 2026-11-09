
<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreatorSeeder extends Seeder
{
    public function run()
    {
        $creators = [
            [
                'email' => 'creator1@boostcv.test',
                'display_name' => 'Creative CV Studio',
                'bio' => 'Menyediakan layanan pembuatan CV profesional dan menarik.',
                'profession' => 'CV Designer',
                'location' => 'Jakarta',
                'phone' => '081234567890',
                'website' => null,
                'instagram' => '@creativecv',
                'linkedin' => null,
            ],
            [
                'email' => 'creator2@boostcv.test',
                'display_name' => 'Professional CV Maker',
                'bio' => 'Membantu membuat CV untuk kebutuhan karier.',
                'profession' => 'Professional CV Writer',
                'location' => 'Depok',
                'phone' => '081234567891',
                'website' => null,
                'instagram' => '@professionalcv',
                'linkedin' => null,
            ],
        ];

        foreach ($creators as $creator) {
            $user = DB::table('users')
                ->where('email', $creator['email'])
                ->first();

            if (!$user) {
                continue;
            }

            unset($creator['email']);

            DB::table('creators')->updateOrInsert(
                ['user_id' => $user->id],
                array_merge($creator, [
                    'updated_at' => now(),
                    'created_at' => now(),
                ])
            );
        }
    }
}
