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
        Schema::create('borrows', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('user_id')->references('id') -> on('users')->onDelete('cascade');
            // $table->foreignId('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->string('user_id');
            $table->string('product_id');
            $table->date('borrow_date');
            $table->date('return_date');
            $table->string('borrow_status');
            $table->integer('quantity');
            $table->integer('price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borrows');
    }
};
