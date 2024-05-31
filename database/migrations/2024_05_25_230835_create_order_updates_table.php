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
        Schema::create('order_updates', function (Blueprint $table) {
            $table->bigIncrements('id'); // id trạng thái vận chuyển hoá đơn
            $table->unsignedBigInteger('order_id')->index(); // id hoá đơn
            $table->unsignedBigInteger('user_id')->index(); // id người dùng
            $table->text('note'); // trạng thái hoá đơn
            $table->timestamps(); // created_at và updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_updates');
    }
};
