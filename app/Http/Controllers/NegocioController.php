<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NegocioController extends Controller
{
    public function index(Request $request)
    {
        // Obtener filtros
        $entidad = $request->input('entidad');
        $actividad = $request->input('actividad');

        // Query base
        $query = DB::table('negocios')
            ->select('id', 'nom_estab', 'direcc', 'telefono', 'correoelec', 'entidad', 'nombre_act');

        // Filtro entidad
        if (!empty($entidad)) {
            $query->where('entidad', $entidad);
        }

        // Filtro actividad
        if (!empty($actividad)) {
            $query->where('nombre_act', 'LIKE', $actividad . '%');
        }

        // PAGINACION (20 por página)
        $negocios = $query->paginate(20)->appends($request->all());

        // Obtener entidades (DISTINTAS)
        $entidades = DB::table('negocios')
            ->select('entidad')
            ->distinct()
            ->orderBy('entidad')
            ->get();

        // Obtener actividades desde tu tabla actividades
        $actividades = DB::table('actividades')
            ->orderBy('nombre')
            ->get();

        return view('negocios.index', compact(
            'negocios',
            'entidades',
            'actividades',
            'entidad',
            'actividad'
        ));
    }
}












