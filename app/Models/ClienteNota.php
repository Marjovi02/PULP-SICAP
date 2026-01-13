<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClienteNota extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente_id',
        'nota',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}
