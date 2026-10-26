<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('order_number')->unique();
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('creator_id');
            $table->unsignedBigInteger('service_id');
            $table->string('service_title');
            $table->string('customer_name')->nullable();
            $table->text('customer_notes')->nullable();
            $table->decimal('price', 12, 2);
            $table->enum('status', ['pending_payment','payment_rejected','in_progress','revision','completed','cancelled'])->default('pending_payment');
            $table->string('result_file')->nullable();
            $table->text('creator_note')->nullable();
            $table->timestamp('started_at')->nullable();
            $table->timestamp('completed_at')->nullable();
            $table->timestamps();
            $table->foreign('customer_id')->references('id')->on('users')->onDelete('restrict');
            $table->foreign('creator_id')->references('id')->on('creators')->onDelete('restrict');
            $table->foreign('service_id')->references('id')->on('services')->onDelete('restrict');
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}