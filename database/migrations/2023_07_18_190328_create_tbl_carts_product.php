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
        Schema::create('tbl_carts_product', function (Blueprint $table) {
            $table->increments("cart_id");
            $table->integer('product_id');
            $table->integer('user_id');
            $table->string('cart_name');
            $table->integer('quantity');
            $table->string('cart_price');
            $table->string('cart_image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_carts_product');
    }
};
