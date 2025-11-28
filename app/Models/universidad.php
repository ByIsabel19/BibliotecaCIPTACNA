<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class universidad extends Model
{
    protected $table = 'universidad';

    public function items()
    {
        return $this->belongsToMany(Item::class, 'detalle', 'id_universidad', 'id_item');
    }
}
