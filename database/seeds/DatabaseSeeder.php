
<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            'UserSeeder',
            'CategorySeeder',
            'CreatorSeeder',
            'ServiceSeeder',
            'PortfolioSeeder',
        ]);
    }
}