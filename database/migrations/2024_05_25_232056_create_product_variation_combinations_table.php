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
        Schema::create('product_variation_combinations', function (Blueprint $table) {
            $table->bigIncrements('id'); // id thuộc tính sản phẩm kết hợp
            $table->unsignedBigInteger('product_id')->index(); // id sản phẩm
            $table->unsignedBigInteger('product_variation_id')->index(); // id thuộc tính sản phẩm
            $table->unsignedBigInteger('variation_id')->index(); // id thuộc tính
            $table->unsignedBigInteger('variation_value_id')->index(); // giá trị thuộc tính
            $table->softDeletes(); // thùng rác (deleted_at)
            $table->timestamps(); // created_at và updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_variation_combinations');
    }
};
