<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->bigIncrements('id');

            // Relasi
            $table->unsignedBigInteger('creator_id');
            $table->unsignedBigInteger('category_id');

            // Informasi layanan
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description');
            $table->decimal('price', 12, 2);

            // Ketentuan layanan
            $table->unsignedInteger('estimated_days')->default(3);
            $table->unsignedInteger('revision_limit')->default(1);
            $table->string('thumbnail')->nullable();

            // Status layanan
            $table->enum('status', [
                'draft',
                'pending',
                'approved',
                'rejected',
            ])->default('draft');

            // Informasi pemeriksaan admin
            $table->text('admin_note')->nullable();
            $table->unsignedBigInteger('reviewed_by')->nullable();
            $table->timestamp('reviewed_at')->nullable();

            $table->timestamps();

            // Foreign key
            $table->foreign('creator_id')
                ->references('id')
                ->on('creators')
                ->onDelete('cascade');

            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('restrict');

            $table->foreign('reviewed_by')
                ->references('id')
                ->on('users')
                ->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('services');
    }
}
