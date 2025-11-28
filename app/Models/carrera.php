<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    protected $table = 'carrera';

    // 🔥 AGREGAR ESTO ES OBLIGATORIO PARA PODER GUARDAR
    protected $fillable = [
        'nombre_carrera',
        'id_capitulo'
    ];

    public function capitulo()
    {
        return $this->belongsTo(Capitulo::class, 'id_capitulo');
    }
}
