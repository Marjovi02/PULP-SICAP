<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tamano extends Model
{
    protected $table = 'tamanos'; // nombre exacto en BD

    protected $fillable = [
        'nombre',
    ];

    // Relación 1:N (un tamaño → muchos negocios)
    public function negocios()
    {
        return $this->hasMany(Negocio::class);
    }
}
