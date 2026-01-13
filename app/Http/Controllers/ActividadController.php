<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
use Illuminate\Http\Request;

class ActividadController extends Controller
{
    // Mostrar listado
    public function index()
    {
        $actividades = Actividad::orderBy('nombre')->get();
        return view('actividades.index', compact('actividades'));
    }

    // Mostrar formulario de creación
    public function create()
    {
        return view('actividades.create');
    }

    // Guardar nueva actividad
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:actividades,nombre',
        ]);

        Actividad::create([
            'nombre' => $request->nombre,
        ]);

        return redirect()->route('actividades.index')
                         ->with('success', 'Actividad creada correctamente.');
    }

    // Mostrar formulario de edición
    public function edit(Actividad $actividad)
    {
        return view('actividades.edit', compact('actividad'));
    }

    // Actualizar actividad
    public function update(Request $request, Actividad $actividad)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:actividades,nombre,' . $actividad->id,
        ]);

        $actividad->update([
            'nombre' => $request->nombre,
        ]);

        return redirect()->route('actividades.index')
                         ->with('success', 'Actividad actualizada correctamente.');
    }

    // Eliminar actividad
    public function destroy(Actividad $actividad)
    {
        $actividad->delete();

        return redirect()->route('actividades.index')
                         ->with('success', 'Actividad eliminada correctamente.');
    }
}
