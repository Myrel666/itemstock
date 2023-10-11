<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id(); // Ini adalah kolom primary key yang secara otomatis dihasilkan oleh Laravel
            $table->string('name');
            $table->integer('price');
            $table->integer('quantity');
            $table->timestamps(); // Kolom 'created_at' dan 'updated_at' untuk mengelola waktu penciptaan dan pembaruan
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
};
