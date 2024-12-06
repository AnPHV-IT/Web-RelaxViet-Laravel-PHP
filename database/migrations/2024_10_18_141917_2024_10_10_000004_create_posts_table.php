<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id()->autoIncrement(); // Tạo cột id
            $table->string('title'); // Cột cho tiêu đề
            $table->text('content'); // Cột cho nội dung
            $table->timestamps(); // Cột cho thời gian tạo và cập nhật
        });
    }

    public function down()
    {
        Schema::dropIfExists('posts'); // Xóa bảng khi rollback
    }
};
