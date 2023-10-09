<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $response = Http::post('http://127.0.0.1:8000/api/usuarios', [
            'email' => $request->input('email'),
            'password' => $request->input('contra')
        ]);

        $usuario = $response->json();

        if ($usuario && $request->input('contra') === $usuario['clave']) {
            $rol = $usuario['id_rol'];
            if ($rol == 1) {
                return redirect()->route('usuarios');
            } elseif ($rol == 2) {
                return redirect()->route('controller_dashboard');
            } elseif ($rol == 3) {
                return redirect()->route('user_profile');
            }
        } else {
            $error = "Credenciales incorrectas";
            return back()->withErrors(['error' => $error]);
        }
    }
}
