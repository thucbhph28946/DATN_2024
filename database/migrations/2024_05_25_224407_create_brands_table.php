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
        Schema::create('brands', function (Blueprint $table) {
            $table->bigIncrements('id'); // id tên thương hiệu
            $table->text('name'); // tên thương hiệu
            $table->string('slug', 255)->unique(); // đường dẫn thương hiệu
            $table->text('meta_description')->nullable(); // meta mô tả thương hiệu
            $table->unsignedBigInteger('meta_img')->index()->nullable(); // meta hình thương hiệu
            $table->text('meta_title')->nullable(); // meta tên thương hiệu
            $table->timestamp('deleted_at')->nullable(); // thùng rác
            $table->timestamps(); // created_at và updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brands');
    }
};
