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
        Schema::create('tbl_order_product', function (Blueprint $table) {
            $table->increments("order_id");
            $table->integer('user_id');
            $table->integer('address_id');
            $table->integer('product_id');
            $table->string('order_name');
            $table->integer('order_quantity');
            $table->string('order_price');
            $table->string('order_image');
            $table->string('order_message');
            $table->string('order_payments');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_order_product');
    }
};
