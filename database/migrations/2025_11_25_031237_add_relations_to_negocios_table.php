<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('negocios', function (Blueprint $table) {

            // ⚠️ entidad_id YA NO EXISTE LA TABLA "entidades", así que no la agregamos
            if (Schema::hasColumn('negocios', 'entidad_id')) {
                $table->dropColumn('entidad_id');
            }

            // Solo agregar si no existe
            if (!Schema::hasColumn('negocios', 'actividad_id')) {
                $table->unsignedBigInteger('actividad_id')->nullable();
                $table->foreign('actividad_id')
                    ->references('id')->on('actividades')
                    ->onDelete('set null');
            }

            if (!Schema::hasColumn('negocios', 'tamano_id')) {
                $table->unsignedBigInteger('tamano_id')->nullable();
                $table->foreign('tamano_id')
                    ->references('id')->on('tamanos')
                    ->onDelete('set null');
            }

            if (!Schema::hasColumn('negocios', 'categoria_id')) {
                $table->unsignedBigInteger('categoria_id')->nullable();
                $table->foreign('categoria_id')
                    ->references('id')->on('categorias')
                    ->onDelete('set null');
            }

            // ⚠️ municipio_id YA SE CREA EN OTRA MIGRACIÓN, NO LO AGREGAMOS NI LE PONEMOS FK
        });
    }

    public function down(): void
    {
        Schema::table('negocios', function (Blueprint $table) {

            // Quitar FKs si existen
            $fkList = [
                'negocios_actividad_id_foreign',
                'negocios_tamano_id_foreign',
                'negocios_categoria_id_foreign'
            ];

            foreach ($fkList as $fk) {
                if (Schema::hasColumn('negocios', str_replace('_foreign','',$fk))) {
                    try {
                        $table->dropForeign($fk);
                    } catch (\Exception $e) {}
                }
            }

            // Quitar columnas
            if (Schema::hasColumn('negocios', 'actividad_id')) $table->dropColumn('actividad_id');
            if (Schema::hasColumn('negocios', 'tamano_id')) $table->dropColumn('tamano_id');
            if (Schema::hasColumn('negocios', 'categoria_id')) $table->dropColumn('categoria_id');
        });
    }
};