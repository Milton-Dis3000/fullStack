<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use Illuminate\Http\Request;

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rol = new Rol();
        return $rol->all();
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
        $rol = new Rol();
        $rol->rol = $request->rol;
        $rol->save();
        return redirect('http://localhost:3000/views/roles.php');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $rol = Rol::find($id);
        $rol->usuarios;
        return $rol;
    }

    /**
     * Show the form for editing the specified resource.
     */


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $rol = Rol::find($id);
        $rol->id = $request->id;
        $rol->rol = $request->rol;

        $rol->save();

        return redirect('http://localhost:3000/views/roles.php');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $rol= Rol::find($id);
        $rol->delete();
        return redirect('http://localhost:3000/views/roles.php');
    }
}
