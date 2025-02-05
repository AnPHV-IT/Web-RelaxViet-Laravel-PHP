<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('name');
            $table->text('description');
            $table->decimal('price', 10, 2);
            $table->string('category');
            $table->string('image');
            $table->integer('quantity');
            $table->string('public_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
};
