<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Persona;
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


    // public function show(string $id)
    // {
    //     $usuario = Usuario::with('persona')->find($id);
    //     return $usuario;
    // }





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


    // public function editarUsuario(Request $request, $id)
    // {
    //     $usuario = Usuario::with('persona')->find($id);

    //     if ($request->isMethod('get')) {
    //         return response()->json($usuario);
    //     } elseif ($request->isMethod('put')) {
    //         $usuario->usuario = $request->input('usuario');
    //         $usuario->clave = $request->input('clave');

    //         // Asignar un valor a 'habilitado' antes de guardar
    //         // $usuario->habilitado = 'habilitado'; // O 'no_habilitado', según corresponda
    //         // $usuario->fecha = '2023-10-04'; // O 'no_habilitado', según corresponda


    //         $usuario->save();

    //         // Procesar y guardar los datos de la persona
    //         $persona = Persona::find($usuario->id_persona);
    //         $persona->primer_nombre = $request->input('primer_nombre');
    //         $persona->segundo_nombre = $request->input('segundo_nombre');
    //         $persona->primer_apellido = $request->input('primer_apellido');
    //         $persona->segundo_apellido = $request->input('segundo_apellido');

    //         $persona->save();

    //         return response()->json(['message' => 'Datos actualizados correctamente']);
    //     }
    // }
}
