<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('order_id')->unique();
            $table->enum('method', ['bank_transfer', 'e_wallet']);
            $table->string('provider')->nullable();
            $table->string('account_name')->nullable();
            $table->decimal('amount', 12, 2);
            $table->string('proof_file')->nullable();
            $table->enum('status', ['unpaid','pending_verification','verified','rejected','refund_pending','refunded'])->default('unpaid');
            $table->unsignedBigInteger('verified_by')->nullable();
            $table->timestamp('verified_at')->nullable();
            $table->text('verification_note')->nullable();
            $table->decimal('refund_amount', 12, 2)->nullable();
            $table->string('refund_proof')->nullable();
            $table->timestamp('refunded_at')->nullable();
            $table->text('refund_note')->nullable();
            $table->timestamps();
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('restrict');
            $table->foreign('verified_by')->references('id')->on('users')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('payments');
    }
}