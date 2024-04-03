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
        Schema::create('informacion_envios', function (Blueprint $table) {
            $table->id();
            $table->string('direccion');
            $table->string('pais');
            $table->string('departamento');
            $table->string('ciudad');
            $table->text('referencias')->nullable();
            $table->string('ruc')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('informacion_envios');
    }
};
