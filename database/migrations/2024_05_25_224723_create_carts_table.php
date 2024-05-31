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
        Schema::create('carts', function (Blueprint $table) {
            $table->bigIncrements('id'); // id giỏ hàng
            $table->unsignedBigInteger('user_id')->nullable(); // id người dùng
            $table->unsignedBigInteger('guest_id')->nullable(); // id khách
            $table->unsignedBigInteger('product_variation_id'); // id thuộc tính sản phẩm
            $table->integer('qty'); // số lượng sản phẩm
            $table->unsignedBigInteger('product_id'); // id sản phẩm
            $table->timestamp('deleted_at')->nullable(); // thùng rác
            $table->timestamps(); // created_at và updated_at

            // Indexes
            $table->index('user_id');
            $table->index('guest_id');
            $table->index('product_variation_id');
            $table->index('product_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
