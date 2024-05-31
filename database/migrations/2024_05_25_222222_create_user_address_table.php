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
        Schema::create('user_address', function (Blueprint $table) {
            $table->bigIncrements('id'); // id sổ địa chỉ
            $table->unsignedBigInteger('user_id')->index(); // id người dùng
            $table->unsignedBigInteger('province_id')->index()->nullable(); // id thành phố/ tỉnh
            $table->unsignedBigInteger('district_id')->index()->nullable(); // id quận/huyện
            $table->unsignedBigInteger('ward_id')->index()->nullable(); // id xã/phường
            $table->string('address', 255)->nullable(); // địa chỉ chi tiết
            $table->string('phone', 255); // số điện thoại
            $table->string('name', 255); // tên
            $table->timestamps(); // created_at và updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_address');
    }
};
