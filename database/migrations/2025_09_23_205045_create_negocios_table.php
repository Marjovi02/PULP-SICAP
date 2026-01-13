<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('negocios', function (Blueprint $table) {
        $table->id();
        $table->string('nombre', 255);
        $table->string('razon_social', 255)->nullable();
        $table->foreignId('municipio_id')->constrained('municipios')->onDelete('cascade');
        $table->foreignId('categoria_id')->nullable()->constrained('categorias')->onDelete('set null');
        $table->foreignId('codigo_postal_id')->nullable()->constrained('codigos_postales')->onDelete('set null');
        $table->foreignId('tamano_id')->nullable()->constrained('tamanos')->onDelete('set null');
        $table->string('actividad', 255)->nullable();
        $table->decimal('latitud', 10, 6)->nullable();
        $table->decimal('longitud', 10, 6)->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('negocios');
    }
};
