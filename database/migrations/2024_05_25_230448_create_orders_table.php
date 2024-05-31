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
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id'); // id hoá đơn
            $table->integer('total_amount')->default(0); // tổng tiền hoá đơn
            $table->unsignedBigInteger('user_id')->index(); // id người dùng
            $table->timestamp('order_date'); // ngày đặt
            $table->string('order_status', 255); // trạng thái thanh toán
            $table->string('shipment_status', 255); // trạng thái hoá đơn
            $table->unsignedBigInteger('review_id')->index(); // id đánh giá
            $table->string('payment_method', 255); // phương thức thanh toán
            $table->unsignedBigInteger('user_address')->index(); // id sổ địa chỉ người dùng
            $table->integer('coupon_discount_amount')->default(0); // số tiền giảm giá
            $table->text('note')->nullable(); // ghi chú đơn hàng

            $table->timestamps(); // created_at và updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
