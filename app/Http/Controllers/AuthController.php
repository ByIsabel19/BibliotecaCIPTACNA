<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index(){
        $titulo = "Login de usuarios";
        return view("modules.auth.login", compact("titulo"));
    }

    public function logear(Request $request){
        //validar datos de las credenciales
        $credenciales = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        
        //buscar el email
        $user = User::where('email', $request->email)->first();

        if(!$user || !Hash::check($request->password, $user->password)){
            return back()->withErrors(['email'=> 'Credencial incorrecta'])->withInput();
        }

        //usuario esté activo
        if(!$user->activo){
            return back()->withErrors(['email'=>'Tu cuenta esta inactiva']);

        }

        //Crear la sesion de usuario
        Auth::login($user);
        $request->session()->regenerate();

        return to_route('home');
    }

    public function crearAdmin(){
        //crear un admin
        User::create([
            'name'=>'Admin UNJBG',
            'email'=>'admin@admin.com',
            'password' => Hash::make('admin'),
            'activo' => true,
            'rol_usuario' => 'admin'
        ]);

        return "Admin creado con exito:)!";
    }
}
