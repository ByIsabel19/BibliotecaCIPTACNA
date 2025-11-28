<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class autor extends Model
{
    protected $table = 'autor';

    public function items()
    {
        return $this->belongsToMany(Item::class, 'autoritem', 'id_autor', 'id_item');
    }

}
