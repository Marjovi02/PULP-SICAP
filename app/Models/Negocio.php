<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Negocio extends Model
{
    protected $table = 'negocios';

    public $timestamps = false; // porque la tabla no tiene created_at/updated_at

    protected $fillable = [
        'nom_estab',
        'direcc',
        'telefono',
        'correoelec',
        'entidad',
        'nombre_act',
    ];
}
