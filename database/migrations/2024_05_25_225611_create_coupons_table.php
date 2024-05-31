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
        Schema::create('coupons', function (Blueprint $table) {
            $table->bigIncrements('id'); // id mã giảm giá
            $table->string('code', 255)->unique(); // mã giảm giá
            $table->string('discount_type', 255)->default('flat'); // loại giảm giá (flat/percentage)
            $table->timestamp('start_date')->nullable(false); // ngày bắt đầu giảm giá
            $table->timestamp('end_date')->nullable(false); // ngày kết thúc giảm giá
            $table->integer('min_spend')->default(0); // số tiền tối thiểu để có thể dùng
            $table->integer('max_discount_amount')->default(0); // số tiền giảm giá tối đa
            $table->integer('total_usage_count')->default(0); // tổng số lượng có thể sử dụng
            $table->integer('customer_usage_limit')->default(1); // 1 người có thể dùng mấy lần
            $table->timestamp('deleted_at')->nullable(); // thùng rác
            $table->timestamps(); // created_at và updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
