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
        Schema::create('coupon_usages', function (Blueprint $table) {
            $table->bigIncrements('id'); // id mã giảm giá khách hàng đã dùng
            $table->string('coupon_code', 255); // mã giảm giá
            $table->unsignedBigInteger('user_id'); // id người dùng
            // Số lần sử dụng mã giảm giá đó
            $table->integer('usage_count')->default(0);
            // Indexes
            $table->index('coupon_code');
            $table->index('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupon_usages');
    }
};
