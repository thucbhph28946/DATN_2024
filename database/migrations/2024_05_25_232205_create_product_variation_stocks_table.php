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
        Schema::create('product_variation_stocks', function (Blueprint $table) {
            $table->bigIncrements('id'); // id số lượng thuộc tính sản phẩm
            $table->unsignedBigInteger('product_variation_id')->index(); // id thuộc tính sản phẩm
            $table->integer('stock_qty')->default(0); // số lượng sản phẩm
            $table->softDeletes(); // thùng rác (deleted_at)
            $table->timestamps(); // created_at và updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_variation_stocks');
    }
};
