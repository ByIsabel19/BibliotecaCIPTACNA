<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Autores extends Controller
{
    public function index()
    {
        return view('modules.Autores.index');
    }

}
