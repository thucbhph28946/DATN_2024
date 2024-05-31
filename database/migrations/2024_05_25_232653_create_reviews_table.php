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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id(); // id đánh giá
            $table->text('content')->nullable(); // nội dung đánh giá
            $table->unsignedBigInteger('image')->index(); // hình ảnh đánh giá
            $table->unsignedBigInteger('user_id')->index(); // id người trả
            $table->unsignedBigInteger('order_id')->index(); // id hoá đơn
            $table->integer('stars'); // số sao
            $table->timestamps(); // created_at và updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
