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
        Schema::create('pages', function (Blueprint $table) {
            $table->bigIncrements('id'); // id trang
            $table->text('title'); // tiêu đề trang
            $table->string('slug')->unique(); // đường dẫn trang
            $table->text('meta_description')->nullable(); // meta mô tả trang
            $table->unsignedBigInteger('meta_img')->index()->nullable(); // meta hình trang
            $table->text('meta_title')->nullable(); // meta tiêu đề trang
            $table->text('image')->nullable(); // hình ảnh trang
            $table->text('content')->nullable(); // nội dung trang
            $table->softDeletes(); // thùng rác (deleted_at)
            $table->timestamps(); // created_at và updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
