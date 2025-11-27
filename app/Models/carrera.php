<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class carrera extends Model
{
    protected $table = 'carrera';

    public function capitulo()
    {
        return $this->belongsTo(capitulo::class, 'id_capitulo');
    }
}
