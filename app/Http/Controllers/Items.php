<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Items extends Controller
{
    public function index(){
        return view('modules.Items.index');
    }
}
