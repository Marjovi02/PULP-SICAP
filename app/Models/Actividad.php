<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    protected $table = 'actividades';

    protected $fillable = [
        'nombre'
    ];

    public function negocios()
    {
        return $this->hasMany(Negocio::class);
    }
}