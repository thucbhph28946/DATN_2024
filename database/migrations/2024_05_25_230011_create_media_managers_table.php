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
        Schema::create('media_managers', function (Blueprint $table) {
            $table->bigIncrements('id'); // id file
            $table->unsignedBigInteger('user_id')->index(); // id người dùng tải file lên
            $table->text('media_file'); // đường dẫn file
            $table->string('media_type', 255)->default('image'); // Loại file
            $table->string('media_extension', 255)->nullable(); // Đuôi file
            $table->timestamps(); // created_at và updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media_managers');
    }
};
