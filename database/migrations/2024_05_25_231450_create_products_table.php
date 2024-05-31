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
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id'); // id sản phẩm
            $table->string('added_by')->nullable(); // tên người đăng sản phẩm
            $table->string('name'); // tên sản phẩm
            $table->string('slug')->unique(); // đường dẫn sản phẩm
            $table->unsignedBigInteger('brand_id')->index(); // id thương hiệu
            $table->unsignedBigInteger('thumbnail_image')->index(); // id hình ảnh đại diện sản phẩm
            $table->text('list_image'); // danh sách hình ảnh
            $table->longText('short_description'); // mô tả ngắn
            $table->longText('description'); // mô tả chi tiết
            $table->integer('price')->default(0); // giá hiện tại
            $table->integer('price_before')->nullable()->default(0); // giá gốc (trước khi giảm)
            $table->integer('stock_qty')->default(0); // số lượng
            $table->integer('is_published')->default(0); // công bố, xuất bản
            $table->integer('is_featured')->default(0); // đặc trưng
            $table->integer('has_variation')->default(1); // có thuộc tính sản phẩm
            $table->text('meta_description')->nullable(); // meta mô tả trang
            $table->unsignedBigInteger('meta_img')->nullable()->index(); // meta hình trang
            $table->text('meta_title')->nullable(); // meta tiêu đề trang
            $table->softDeletes(); // thùng rác (deleted_at)
            $table->timestamps(); // created_at và updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
