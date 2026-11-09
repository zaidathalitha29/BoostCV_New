
<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            [
                'name' => 'CV ATS',
                'slug' => 'cv-ats',
                'description' => 'Layanan pembuatan CV yang ramah sistem Applicant Tracking System.',
                'is_active' => true,
            ],
            [
                'name' => 'CV Kreatif',
                'slug' => 'cv-kreatif',
                'description' => 'CV dengan desain kreatif dan menarik.',
                'is_active' => true,
            ],
            [
                'name' => 'CV Fresh Graduate',
                'slug' => 'cv-fresh-graduate',
                'description' => 'CV untuk lulusan baru yang ingin melamar pekerjaan.',
                'is_active' => true,
            ],
            [
                'name' => 'CV Profesional',
                'slug' => 'cv-profesional',
                'description' => 'CV untuk pekerja yang sudah memiliki pengalaman kerja.',
                'is_active' => true,
            ],
            [
                'name' => 'CV Akademik',
                'slug' => 'cv-akademik',
                'description' => 'CV untuk kebutuhan pendidikan dan akademik.',
                'is_active' => true,
            ],
        ];

        foreach ($categories as $category) {
            DB::table('categories')->updateOrInsert(
                ['slug' => $category['slug']],
                array_merge($category, [
                    'created_at' => now(),
                    'updated_at' => now(),
                ])
            );
        }
    }
}
