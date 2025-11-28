<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class detalle extends Model
{
    protected $table = 'detalle';
    protected $primaryKey = 'id';
    public $incrementing = true;

    protected $fillable = [
        'id_item',
        'id_universidad',
        'id_carrera'
    ];

    public function item()
    {
        return $this->belongsTo(item::class, 'id_item');
    }

    public function universidad()
    {
        return $this->belongsTo(universidad::class, 'id_universidad');
    }

    public function carrera()
    {
        return $this->belongsTo(carrera::class, 'id_carrera');
    }
}
