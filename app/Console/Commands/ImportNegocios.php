<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ImportNegocios extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:import-negocios';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Importa negocios desde CSV de Zacatecas';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Ruta del archivo CSV
        $path = storage_path('app/denue/DENUE_Zacatecas.csv');

        // Verificar si el archivo existe
        if (!file_exists($path)) {
            $this->error("El archivo no existe en: " . $path);
            return;
        }

        $this->info("Ruta del archivo: " . $path);

        // Abrir CSV
        if (($handle = fopen($path, 'r')) !== false) {
            $header = fgetcsv($handle); // saltar encabezados

            while (($row = fgetcsv($handle, 1000, ',')) !== false) {
                try {
                    DB::table('negocios')->insert([
                        'nombre' => $row[1] ?? null,
                        'razon_social' => $row[2] ?? null,
                        'actividad' => $row[3] ?? null,
                        'estrato' => $row[4] ?? null,
                        'calle' => $row[5] ?? null,
                        'numero' => $row[6] ?? null,
                        'colonia' => $row[7] ?? null,
                        'latitud' => $row[11] ?? null,
                        'longitud' => $row[12] ?? null,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                } catch (\Exception $e) {
                    $this->error("Error al insertar la fila: " . implode(',', $row));
                    $this->error("Mensaje: " . $e->getMessage());
                }
            }

            fclose($handle);
            $this->info('Importación terminada.');
        } else {
            $this->error("No se pudo abrir el archivo CSV.");
        }
    }
}
