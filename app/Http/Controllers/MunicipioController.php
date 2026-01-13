<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use App\Models\Municipio;
use Illuminate\Http\Request;

class MunicipioController extends Controller
{
    // Mostrar lista de municipios
    public function index()
    {
        $municipios = Municipio::with('estado')->orderBy('nombre')->paginate(20);
        return view('municipios.index', compact('municipios'));
    }

    // Mostrar formulario de creación
    public function create()
    {
        $estados = Estado::orderBy('nombre')->get();
        return view('municipios.create', compact('estados'));
    }

    // Guardar un nuevo municipio
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'estado_id' => 'required|exists:estados,id',
        ]);

        Municipio::create($request->all());

        return redirect()->route('municipios.index')
            ->with('success', 'Municipio creado correctamente.');
    }

    // Mostrar formulario de edición
    public function edit(Municipio $municipio)
    {
        $estados = Estado::orderBy('nombre')->get();
        return view('municipios.edit', compact('municipio', 'estados'));
    }

    // Actualizar municipio
    public function update(Request $request, Municipio $municipio)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'estado_id' => 'required|exists:estados,id',
        ]);

        $municipio->update($request->all());

        return redirect()->route('municipios.index')
            ->with('success', 'Municipio actualizado correctamente.');
    }

    // Eliminar municipio
    public function destroy(Municipio $municipio)
    {
        $municipio->delete();

        return redirect()->route('municipios.index')
            ->with('success', 'Municipio eliminado correctamente.');
    }
}
