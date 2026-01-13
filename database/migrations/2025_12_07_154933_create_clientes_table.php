<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_empresa');
            $table->string('nombre_negocio')->nullable();
            $table->string('direccion')->nullable();
            $table->string('redes_sociales')->nullable();
            $table->string('telefono')->nullable();
            $table->string('correo')->nullable();
            $table->string('giro_comercial')->nullable();
            $table->enum('tipo_venta', ['servicio', 'producto', 'ambos'])->nullable();
            $table->text('historial')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};


