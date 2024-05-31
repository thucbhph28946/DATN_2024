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
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id'); // id chuyên mục sản phẩm
            $table->text('name'); // tiêu đề chuyên mục sản phẩm
            $table->string('slug')->unique(); // đường dẫn chuyên mục sản phẩm
            $table->text('meta_description')->nullable(); // meta mô tả chuyên mục sản phẩm
            $table->unsignedBigInteger('meta_img')->nullable(); // meta hình chuyên mục sản phẩm
            $table->text('meta_title')->nullable(); // meta tiêu đề chuyên mục sản phẩm
            $table->unsignedBigInteger('thumbnail_image'); // ảnh đại diện (bìa)
            $table->integer('is_active')->default(1); // hiện bài viết
            $table->integer('is_featured')->default(0); // chuyên mục đặc trưng
            $table->timestamp('deleted_at')->nullable(); // thùng rác
            $table->timestamps(); // created_at và updated_at

            // Indexes
            $table->index('meta_img');
            $table->index('thumbnail_image');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
