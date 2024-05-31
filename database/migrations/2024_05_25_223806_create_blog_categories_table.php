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
        Schema::create('blog_categories', function (Blueprint $table) {
            $table->bigIncrements('id'); // id chuyên mục bài viết
            $table->text('name'); // tiêu đề chuyên mục bài viết
            $table->string('slug', 255)->unique(); // đường dẫn chuyên mục bài viết
            $table->text('meta_description')->nullable(); // meta mô tả chuyên mục bài viết
            $table->unsignedBigInteger('meta_img')->nullable()->index(); // meta hình chuyên mục bài viết
            $table->text('meta_title')->nullable(); // meta tiêu đề chuyên mục bài viết
            $table->timestamp('deleted_at')->nullable(); // thùng rác
            $table->timestamps(); // created_at và updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_categories');
    }
};
