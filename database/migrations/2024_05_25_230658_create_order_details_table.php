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
        Schema::create('order_details', function (Blueprint $table) {
            $table->bigIncrements('id'); // id chi tiết hoá đơn
            $table->unsignedBigInteger('product_id')->index(); // id sản phẩm
            $table->integer('quantity'); // số lượng
            $table->unsignedBigInteger('order_id')->index(); // id hoá đơn
            $table->unsignedBigInteger('product_variation_id')->index(); // id thuộc tính sản phẩm
            $table->timestamps(); // created_at và updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};
