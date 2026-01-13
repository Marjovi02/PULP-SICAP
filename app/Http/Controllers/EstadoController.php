<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use Illuminate\Http\Request;

class EstadoController extends Controller
{
    /**
     * Mostrar lista de estados
     */
    public function index()
    {
        $estados = Estado::orderBy('nombre')->get();
        return view('estados.index', compact('estados'));
    }

    /**
     * Mostrar formulario para crear un nuevo estado
     */
    public function create()
    {
        return view('estados.create');
    }

    /**
     * Guardar un nuevo estado
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100|unique:estados,nombre',
        ]);

        Estado::create([
            'nombre' => $request->nombre,
        ]);

        return redirect()->route('estados.index')->with('success', 'Estado creado correctamente.');
    }

    /**
     * Mostrar un solo estado
     */
    public function show($id)
    {
        $estado = Estado::findOrFail($id);
        return view('estados.show', compact('estado'));
    }

    /**
     * Formulario para editar un estado
     */
    public function edit($id)
    {
        $estado = Estado::findOrFail($id);
        return view('estados.edit', compact('estado'));
    }

    /**
     * Actualizar estado
     */
    public function update(Request $request, $id)
    {
        $estado = Estado::findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|max:100|unique:estados,nombre,'.$id,
        ]);

        $estado->update([
            'nombre' => $request->nombre,
        ]);

        return redirect()->route('estados.index')->with('success', 'Estado actualizado correctamente.');
    }

    /**
     * Eliminar un estado
     */
    public function destroy($id)
    {
        $estado = Estado::findOrFail($id);
        $estado->delete();

        return redirect()->route('estados.index')->with('success', 'Estado eliminado.');
    }
}