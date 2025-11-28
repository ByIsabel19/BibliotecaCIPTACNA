<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class item extends Model
{
    protected $table = 'item';
    protected $primaryKey = 'id';
    public $incrementing = true;

    protected $fillable = [
        'id_categoria',
        'nombre_item',
        'anio_item',
        'disco_item'
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }

    public function autores()
    {
        return $this->belongsToMany(Autor::class, 'autoritem', 'id_item', 'id_autor');
    }

    public function detalle()
    {
        return $this->hasOne(Detalle::class, 'id_item');
    }

    public function universidad()
    {
        return $this->hasOneThrough(
            Universidad::class,
            Detalle::class,
            'id_item',
            'id',
            'id',
            'id_universidad'
        );
    }

    public function carrera()
    {
        return $this->hasOneThrough(
            Carrera::class,
            Detalle::class,
            'id_item',
            'id',
            'id',
            'id_carrera'
        );
    }

}
