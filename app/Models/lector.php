<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class lector extends Model
{
    protected $table = 'lector';
    protected $primaryKey = 'id_lector';
    protected $fillable = [
        'telefono_lector',
        'cip_lector',
        'id_usuario'
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario', 'id');
    }
}
