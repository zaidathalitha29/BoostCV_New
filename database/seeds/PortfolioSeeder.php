
<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PortfolioSeeder extends Seeder
{
    public function run()
    {
        $creator1 = DB::table('creators')
            ->where('display_name', 'Creative CV Studio')
            ->first();

        $creator2 = DB::table('creators')
            ->where('display_name', 'Professional CV Maker')
            ->first();

        if (!$creator1 || !$creator2) {
            return;
        }

        $portfolios = [
            [
                'creator_id' => $creator1->id,
                'title' => 'Desain CV ATS',
                'description' => 'Contoh hasil desain CV ATS yang sederhana dan profesional.',
                'image' => null,
                'file_path' => null,
                'project_url' => null,
                'is_published' => true,
            ],
            [
                'creator_id' => $creator2->id,
                'title' => 'Desain CV Kreatif',
                'description' => 'Contoh hasil desain CV kreatif untuk kebutuhan melamar pekerjaan.',
                'image' => null,
                'file_path' => null,
                'project_url' => null,
                'is_published' => true,
            ],
        ];

        foreach ($portfolios as $portfolio) {
            DB::table('portfolios')->updateOrInsert(
                [
                    'creator_id' => $portfolio['creator_id'],
                    'title' => $portfolio['title'],
                ],
                array_merge($portfolio, [
                    'created_at' => now(),
                    'updated_at' => now(),
                ])
            );
        }
    }
}