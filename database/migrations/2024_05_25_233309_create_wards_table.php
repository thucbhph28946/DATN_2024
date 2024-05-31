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
        Schema::create('wards', function (Blueprint $table) {
            $table->id(); // id xã/thị trấn
            $table->string('code', 20)->nullable(); // code xã/thị trấn
            $table->string('name', 255); // tên ngắn xã/thị trấn
            $table->string('name_en', 255)->nullable(); // tên ngắn xã/thị trấn EN
            $table->string('full_name', 255)->nullable(); // tên xã/thị trấn
            $table->string('full_name_en', 255)->nullable(); // tên xã/thị trấn EN
            $table->string('code_name', 255)->nullable(); // rút gọn xã/thị trấn
            $table->string('district_code', 20); // code huyện (foreign key)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wards');
    }
};
