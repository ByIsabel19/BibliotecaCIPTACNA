<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\capitulo;

class CapitulosController extends Controller
{
    public function storeAjax(Request $request)
    {
        $request->validate([
            'nombre_capitulo' => 'required|string|max:200'
        ]);

        $cap = new capitulo();
        $cap->nombre_capitulo = $request->nombre_capitulo;
        $cap->save();

        return response()->json([
            'success' => true,
            'capitulo' => [
                'id' => $cap->id,
                'nombre' => $cap->nombre_capitulo
            ]
        ]);
    }
}
