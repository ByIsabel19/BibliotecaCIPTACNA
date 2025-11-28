<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class autoritem extends Model
{
    protected $table = 'autoritem';
    protected $primaryKey = 'id';
    public $incrementing = true;

    protected $fillable = [
        'id_autor',
        'id_item'
    ];
}
