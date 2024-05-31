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
        Schema::create('districts', function (Blueprint $table) {
            $table->id(); // id tự tăng
            $table->string('code', 20)->unique(); // mã quận/huyện
            $table->string('name', 255); // tên ngắn quận/huyện
            $table->string('name_en', 255)->nullable(); // tên ngắn quận/huyện EN
            $table->string('full_name', 255)->nullable(); // tên quận/huyện
            $table->string('full_name_en', 255)->nullable(); // tên quận/huyện EN
            $table->string('code_name', 255)->nullable(); // rút gọn quận/huyện
            $table->string('province_code', 20); // id tỉnh/ thành phố

            // Indexes
            $table->index('province_code');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('districts');
    }
};
