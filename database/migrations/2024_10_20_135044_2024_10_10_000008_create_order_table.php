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
        Schema::create('orders', function (Blueprint $table) {
            $table->id()->autoIncrement(); 
            $table->unsignedBigInteger('productId');
            $table->unsignedBigInteger('colorId');
            $table->unsignedBigInteger('userId');
            $table->unsignedBigInteger('categoryId');
            $table->integer("amount");
            $table->enum("status",["WAITING", "CONFIRMED", "CANCELED"])->default("WAITING");

            $table->foreign('userId')
            ->references('id')
            ->on('Users')
            ->onDelete('cascade');
            
            $table->foreign('productId')
                ->references('id')
                ->on('products')
                ->onDelete('cascade');

            $table->foreign('colorId')
                ->references('id')
                ->on('colors')
                ->onDelete('cascade');

            $table->foreign('categoryId')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
