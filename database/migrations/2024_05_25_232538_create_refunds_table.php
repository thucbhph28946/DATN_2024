<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('refunds', function (Blueprint $table) {
            $table->id(); // id hoàn trả sản phẩm
            $table->unsignedBigInteger('user_id')->index(); // id người trả
            $table->unsignedBigInteger('order_id')->index(); // id hoá đơn
            $table->unsignedBigInteger('product_id')->index(); // id sản phẩm
            $table->string('order_payment_status')->nullable(); // trạng thái thanh toán hoá đơn
            $table->text('refund_reason')->nullable(); // lý do hoàn tiền
            $table->text('refund_reject_reason')->nullable(); // lý do từ chối hoàn tiền
            $table->string('refund_status')->default('pending'); // trạng thái hoàn tiền
            $table->timestamps(); // created_at và updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('refunds');
    }
};
