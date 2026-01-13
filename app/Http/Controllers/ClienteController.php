<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\ClienteNota;
use Illuminate\Http\Request;

use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{
    // =============================
    // IMPORTAR EXCEL
    // =============================
    public function importar(Request $request)
    {
        $request->validate([
            'archivo' => 'required|file|mimes:xlsx,xls'
        ]);

        $file = $request->file('archivo')->getRealPath();

        try {
            $spreadsheet = IOFactory::load($file);
            $rows = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
        } catch (\Exception $e) {
            return back()->with('error', 'El archivo no se pudo leer: ' . $e->getMessage());
        }

        DB::beginTransaction();

        try {
            foreach ($rows as $row) {

                // Saltar filas vacías o encabezados
                if (empty($row['A']) || $row['A'] == "nombre_negocio") continue;

                Cliente::create([
                    'nombre_negocio' => $row['A'] ?? null,
                    'nombre_empresa' => $row['B'] ?? null,
                    'telefono'       => $row['C'] ?? null,
                    'correo'         => $row['D'] ?? null,
                    'direccion'      => $row['E'] ?? null,
                    'giro_comercial' => $row['F'] ?? null,
                    'tipo_venta'     => $row['G'] ?? null,
                    'historial'      => $row['H'] ?? null,
                ]);
            }

            DB::commit();

            return back()->with('success', 'Clientes importados correctamente');

        } catch (\Exception $e) {

            DB::rollBack();
            return back()->with('error', 'Error al importar: ' . $e->getMessage());
        }
    }


    // =============================
    // LISTADO
    // =============================
    public function index()
    {
        $clientes = Cliente::with(['notas' => function ($q) {
            $q->latest()->limit(1);
        }])->orderBy('nombre_negocio', 'asc')->get();

        return view('clientes.index', compact('clientes'));
    }


    // =============================
    // FORMULARIO NUEVO CLIENTE
    // =============================
    public function create()
    {
        return view('clientes.create');
    }


    // =============================
    // GUARDAR CLIENTE
    // =============================
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre_empresa' => 'nullable|string|max:255',
            'nombre_negocio' => 'required|string|max:255',
            'direccion'      => 'nullable|string|max:255',
            'redes_sociales' => 'nullable|string|max:255',
            'telefono'       => 'nullable|string|max:50',
            'correo'         => 'nullable|email|max:255',
            'giro_comercial' => 'nullable|string|max:255',
            'tipo_venta'     => 'nullable|string|max:50',
            'historial'      => 'nullable|string',
        ]);

        Cliente::create($validated);

        return redirect()
            ->route('clientes.index')
            ->with('success', 'Cliente agregado correctamente');
    }


    // =============================
    // MOSTRAR DETALLES
    // =============================
    public function show(Cliente $cliente)
    {
        return view('clientes.show', compact('cliente'));
    }


    // =============================
    // EDITAR FORMULARIO
    // =============================
    public function edit(Cliente $cliente)
    {
        return view('clientes.edit', compact('cliente'));
    }


    // =============================
    // ACTUALIZAR CLIENTE
    // =============================
    public function update(Request $request, Cliente $cliente)
    {
        $validated = $request->validate([
            'nombre_empresa' => 'nullable|string|max:255',
            'nombre_negocio' => 'required|string|max:255',
            'direccion'      => 'nullable|string|max:255',
            'redes_sociales' => 'nullable|string|max:255',
            'telefono'       => 'nullable|string|max:50',
            'correo'         => 'nullable|email|max:255',
            'giro_comercial' => 'nullable|string|max:255',
            'tipo_venta'     => 'nullable|string|max:50',
            'historial'      => 'nullable|string',
        ]);

        $cliente->update($validated);

        return redirect()
            ->route('clientes.show', $cliente->id)
            ->with('success', 'Cliente actualizado correctamente');
    }


    // =============================
    // ELIMINAR CLIENTE
    // =============================
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();

        return redirect()
            ->route('clientes.index')
            ->with('success', 'Cliente eliminado correctamente');
    }


    // =============================
    // AGREGAR NOTA
    // =============================
    public function agregarNota(Request $request, Cliente $cliente)
    {
        $request->validate([
            'nota' => 'required|string',
        ]);

        $cliente->notas()->create([
            'nota' => $request->nota,
        ]);

        return redirect()
            ->route('clientes.show', $cliente)
            ->with('success', 'Nota agregada correctamente');
    }


    // =============================
    // ELIMINAR NOTA
    // =============================
    public function destroyNota(Cliente $cliente, ClienteNota $nota)
    {
        if ($nota->cliente_id !== $cliente->id) {
            abort(403, 'Acceso denegado');
        }

        $nota->delete();

        return redirect()
            ->route('clientes.show', $cliente)
            ->with('success', 'Nota eliminada correctamente');
    }
}
