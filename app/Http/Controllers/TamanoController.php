<?php

namespace App\Http\Controllers;

use App\Models\Tamano;
use Illuminate\Http\Request;

class TamanoController extends Controller
{
    /**
     * Mostrar listado de tamaños.
     */
    public function index()
    {
        $tamanos = Tamano::all();
        return view('tamanos.index', compact('tamanos'));
    }

    /**
     * Mostrar formulario de creación.
     */
    public function create()
    {
        return view('tamanos.create');
    }

    /**
     * Guardar un nuevo tamaño.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:50',
        ]);

        Tamano::create([
            'nombre' => $request->nombre
        ]);

        return redirect()->route('tamanos.index')
            ->with('success', 'Tamaño creado correctamente.');
    }

    /**
     * Mostrar formulario de edición.
     */
    public function edit($id)
    {
        $tamano = Tamano::findOrFail($id);
        return view('tamanos.edit', compact('tamano'));
    }

    /**
     * Actualizar tamaño.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:50',
        ]);

        $tamano = Tamano::findOrFail($id);
        $tamano->update([
            'nombre' => $request->nombre
        ]);

        return redirect()->route('tamanos.index')
            ->with('success', 'Tamaño actualizado correctamente.');
    }

    /**
     * Eliminar tamaño.
     */
    public function destroy($id)
    {
        $tamano = Tamano::findOrFail($id);
        $tamano->delete();

        return redirect()->route('tamanos.index')
            ->with('success', 'Tamaño eliminado correctamente.');
    }
}
