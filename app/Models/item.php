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

    public function categoria(){
        return $this->belongsTo(categoria::class, 'id_categoria');
    }

    public function autores(){
        return $this->belongsToMany(
            autor::class,
            'autoritem',
            'id_item',
            'id_autor'
        );
    }

    public function detalle(){
        return $this->hasOne(detalle::class, 'id_item');
    }
}
