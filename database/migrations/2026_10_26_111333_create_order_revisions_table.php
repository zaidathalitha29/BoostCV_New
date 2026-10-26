<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderRevisionsTable extends Migration
{
    public function up()
    {
        Schema::create('order_revisions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('requested_by');
            $table->text('request_description');
            $table->string('result_file')->nullable();
            $table->text('creator_response')->nullable();
            $table->enum('status', ['requested','in_progress','completed','rejected'])->default('requested');
            $table->timestamp('completed_at')->nullable();
            $table->timestamps();
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('requested_by')->references('id')->on('users')->onDelete('restrict');
        });
    }

    public function down()
    {
        Schema::dropIfExists('order_revisions');
    }
}