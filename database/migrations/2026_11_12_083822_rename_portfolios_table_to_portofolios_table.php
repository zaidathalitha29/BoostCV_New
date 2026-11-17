<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class RenamePortfoliosTableToPortofoliosTable extends Migration
{
    public function up()
    {
        Schema::rename('portfolios', 'portofolios');
    }

    public function down()
    {
        Schema::rename('portofolios', 'portfolios');
    }
}
