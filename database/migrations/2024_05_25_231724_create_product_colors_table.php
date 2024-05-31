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
        Schema::create('product_colors', function (Blueprint $table) {
            $table->bigIncrements('id'); // id màu sắc sản phẩm
            $table->unsignedBigInteger('product_id')->index(); // id sản phẩm
            $table->unsignedBigInteger('variation_value_id')->index(); // id thuộc tính sản phẩm
            $table->unsignedBigInteger('image')->nullable()->index(); // id hình ảnh
            $table->softDeletes(); // thùng rác (deleted_at)
            $table->timestamps(); // created_at và updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_colors');
    }
};
