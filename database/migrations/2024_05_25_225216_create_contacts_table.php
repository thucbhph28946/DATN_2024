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
        Schema::create('contacts', function (Blueprint $table) {
            $table->bigIncrements('id'); // id liên hệ
            $table->string('name', 100); // tên người dùng
            $table->string('email', 255); // địa chỉ email
            $table->string('phone', 255); // số điện thoại
            $table->text('message'); // nội dung cần hỗ trợ
            $table->integer('status')->default(0); // trạng thái xử lý hỗ trợ
            $table->timestamps(); // created_at và updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
