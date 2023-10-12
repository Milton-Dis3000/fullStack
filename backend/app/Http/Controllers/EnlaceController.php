<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use App\Models\Enlace;
use Illuminate\Http\Request;

class EnlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $enlace = new Enlace();
        return $enlace->all();
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
        $enlace = new Enlace();
        $enlace->descripcion = $request->descripcion;
        $enlace->id_pagina = $request->id_pagina;
        $enlace->id_rol = $request->id_rol;

        $enlace->save();

        return redirect('http://localhost:3000/views/enlaces.php');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $enlace = Enlace::find($id);
        return $enlace;
    }




    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $enlace = Enlace::find($id);
        $enlace->descripcion = $request->descripcion;
        $enlace->id_pagina = $request->id_pagina;
        $enlace->id_rol = $request->id_rol;

        $enlace->save();

        return redirect('http://localhost:3000/views/enlaces.php');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $enlace = Enlace::find($id);
        $enlace->delete();
        return redirect('http://localhost:3000/views/enlaces.php');
    }




    public function obtenerDatosParametros(Request $request, $id)
    {
        $enlace = Enlace::with('pagina')->find($id);

        if ($request->isMethod('get')) {
            return response()->json($enlace);
        } elseif ($request->isMethod('put')) {
            $enlace->url = $request->input('url');
            $enlace->icono = $request->input('icono');
            $enlace->descripcion = $request->input('descripcion');

            // Asignar un valor a 'habilitado' antes de guardar
            // $usuario->habilitado = 'habilitado'; // O 'no_habilitado', según corresponda
            // $usuario->fecha = '2023-10-04'; // O 'no_habilitado', según corresponda

            $enlace->save();

            // Obtener y actualizar el rol
            $rol = Rol::find($enlace->id_rol);
            $rol->rol = $request->input('rol');
            $rol->save();


            return response()->json(['message' => 'Datos actualizados correctamente']);
        }
    }
}
