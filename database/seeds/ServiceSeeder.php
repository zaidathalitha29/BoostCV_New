<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    public function run()
    {
        $creator1 = DB::table('creators')
            ->where('display_name', 'Creative CV Studio')
            ->first();

        $creator2 = DB::table('creators')
            ->where('display_name', 'Professional CV Maker')
            ->first();

        $category1 = DB::table('categories')
            ->where('slug', 'cv-ats')
            ->first();

        $category2 = DB::table('categories')
            ->where('slug', 'cv-kreatif')
            ->first();

        if (!$creator1 || !$creator2 || !$category1 || !$category2) {
            return;
        }

        $services = [
            [
                'creator_id' => $creator1->id,
                'category_id' => $category1->id,
                'title' => 'Pembuatan CV ATS Profesional',
                'slug' => 'pembuatan-cv-ats-profesional',
                'description' => 'Layanan pembuatan CV ATS yang rapi dan sesuai kebutuhan melamar pekerjaan.',
                'price' => 75000,
                'estimated_days' => 3,
                'revision_limit' => 2,
                'status' => 'approved',
            ],
            [
                'creator_id' => $creator2->id,
                'category_id' => $category2->id,
                'title' => 'Pembuatan CV Kreatif',
                'slug' => 'pembuatan-cv-kreatif',
                'description' => 'Layanan pembuatan CV dengan desain kreatif dan tampilan menarik.',
                'price' => 100000,
                'estimated_days' => 4,
                'revision_limit' => 2,
                'status' => 'pending',
            ],
        ];

        foreach ($services as $service) {
            DB::table('services')->updateOrInsert(
                ['slug' => $service['slug']],
                array_merge($service, [
                    'reviewed_by' => null,
                    'reviewed_at' => null,
                    'admin_note' => null,
                    'thumbnail' => null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ])
            );
        }
    }
}
