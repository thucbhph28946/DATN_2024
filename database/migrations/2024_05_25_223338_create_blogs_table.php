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
        Schema::create('blogs', function (Blueprint $table) {
            $table->bigIncrements('id'); // id bài viết
            $table->text('title'); // tiêu đề bài viết
            $table->string('slug',255)->unique(); // đường dẫn bài viết
            $table->longText('short_description'); // mô tả ngắn
            $table->longText('description'); // nội dung
            $table->unsignedBigInteger('thumbnail_image')->index(); // id ảnh đại diện (bìa)
            $table->unsignedBigInteger('author')->index(); // id người đăng
            $table->integer('is_active')->default(1); // hiện bài viết
            $table->integer('is_popular')->default(0); // bài viết phổ biến
            $table->text('meta_description')->nullable(); // meta mô tả bài viết
            $table->unsignedBigInteger('meta_img')->nullable()->index(); // meta hình bài viết
            $table->text('meta_title')->nullable(); // meta tiêu đề bài viết
            $table->timestamp('deleted_at')->nullable(); // thùng rác
            $table->timestamps(); // created_at và updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
