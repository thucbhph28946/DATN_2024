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
        Schema::create('variation_values', function (Blueprint $table) {
            $table->id(); // id giá trị thuộc tính
            $table->unsignedBigInteger('variation_id')->index(); // id thuộc tính (foreign key)
            $table->string('name'); // tên giá trị thuộc tính
            $table->integer('is_active')->default(0); // trạng thái kích hoạt (0: inactive, 1: active)
            $table->unsignedBigInteger('image')->index()->nullable(); // id hình ảnh
            $table->string('color_code')->nullable(); // mã màu
            $table->timestamps(); // created_at và updated_at
            $table->softDeletes(); // deleted_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('variation_values');
    }
};
