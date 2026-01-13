<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_empresa',
        'nombre_negocio',
        'direccion',
        'redes_sociales',
        'telefono',
        'correo',
        'giro_comercial',
        'tipo_venta',
        'historial',
    ];

    public function notas()
{
    return $this->hasMany(ClienteNota::class)->latest();
}

}

