<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuario = new Usuario();
        return $usuario->all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $usuario = new Usuario();

        $usuario->usuario = $request->usuario;
        $usuario->clave = $request->clave;
        $usuario->habilitado = $request->habilitado;
        $usuario->fecha = $request->fecha;
        $usuario->id_persona = $request->id_persona;
        $usuario->id_rol = $request->id_rol;

        $usuario->save();

        return redirect('http://localhost:3000/views/usuarios.php');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $usuario = Usuario::find($id);
        $usuario->personas;
        return $usuario;
    }

    /**
     * Show the form for editing the specified resource.
     */




    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $usuario = Usuario::find($id);
        $usuario->usuario = $request->usuario;
        $usuario->clave = $request->clave;
        $usuario->habilitado = $request->habilitado;
        $usuario->fecha = $request->fecha;
        $usuario->id_persona = $request->id_persona;
        $usuario->id_rol = $request->id_rol;

        $usuario->save();

        return redirect('http://localhost:3000/views/usuarios.php');

        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $usuario = Usuario::find($id);
        $usuario->delete();
        return redirect('http://localhost:3000/views/usuarios.php');
    }

    
}
