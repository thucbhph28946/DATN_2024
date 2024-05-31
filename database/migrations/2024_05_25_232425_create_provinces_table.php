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
        Schema::create('provinces', function (Blueprint $table) {
            $table->id(); // id tỉnh thành
            $table->string('code', 20)->unique(); // code tỉnh thành
            $table->string('name'); // tên ngắn tỉnh thành
            $table->string('name_en')->nullable(); // tên ngắn tỉnh thành EN
            $table->string('full_name')->nullable(); // tên tỉnh thành
            $table->string('full_name_en')->nullable(); // tên tỉnh thành EN
            $table->string('code_name')->nullable(); // rút gọn tỉnh thành
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('provinces');
    }
};
