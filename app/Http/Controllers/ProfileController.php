<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('profile.edit'); // Revisa que la vista exista
    }

    public function update(Request $request)
    {
        // Lógica para actualizar perfil
    }

    public function destroy()
    {
        // Lógica para eliminar perfil
    }
}
