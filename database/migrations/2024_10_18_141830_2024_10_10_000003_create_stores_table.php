<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            // Thêm các cột cần thiết vào bảng 'stores'
            $table->id()->autoIncrement();
            $table->string('name')->nullable(); // Ví dụ: thêm cột name
            $table->string('location')->nullable(); // Ví dụ: thêm cột location
        });
    }

    public function down()
    {
        Schema::dropIfExists('stores');
    }
};
