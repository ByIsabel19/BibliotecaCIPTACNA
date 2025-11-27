<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class item extends Model
{
    protected $table = 'item';

    protected $fillable = [
        'id_categoria',
        'nombre_item',
        'anio_item',
        'disco_item'
    ];

    public function categoria()
    {
        return $this->belongsTo(\App\Models\categoria::class, 'id_categoria');
    }
}
