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
        Schema::create('tbl_address_order', function (Blueprint $table) {
            $table->increments("address_id");
            $table->integer('user_id');
            $table->string('address_name');
            $table->integer('address_phone');
            $table->string('address_conscious');
            $table->string('address_district');
            $table->string('address_ward');
            $table->string('address_address');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_address_order');
    }
};
