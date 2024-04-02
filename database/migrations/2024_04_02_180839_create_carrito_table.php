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
      // Migración para la tabla de carrito
Schema::create('carrito', function (Blueprint $table) 
    {
        $table->id();
        $table->unsignedBigInteger('producto_id');
        $table->integer('cantidad')->default(1); // La cantidad de productos en el carrito
        $table->timestamps();

        // Clave foránea
        $table->foreign('producto_id')->references('id')->on('productos')->onDelete('cascade');
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carrito');
    }
};
