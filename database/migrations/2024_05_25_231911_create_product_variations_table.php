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
        Schema::create('product_variations', function (Blueprint $table) {
            $table->bigIncrements('id'); // id thuộc tính sản phẩm
            $table->unsignedBigInteger('product_id')->index(); // id sản phẩm
            $table->string('variation_key')->nullable(); // key thuộc tính sản phẩm
            $table->string('sku')->nullable()->unique(); // mã sản phẩm
            $table->string('code')->nullable(); // code sản phẩm
            $table->integer('price')->default(0); // giá sản phẩm
            $table->softDeletes(); // thùng rác (deleted_at)
            $table->timestamps(); // created_at và updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_variations');
    }
};
