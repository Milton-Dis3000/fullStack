<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class BitacoraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bitacoras = Bitacora::all();
        return response()->json($bitacoras);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Bitacora $bitacora)
    {
        //
    }

  

    public function update(Request $request, Bitacora $bitacora)
    {

        $bitacora = new Bitacora();
        $bitacora->bitacora = date('Y-m-d'); 
        $bitacora->fecha = date('Y-m-d');
        $bitacora->hora = date('H:i:s');
        $bitacora->ip = $_SERVER['REMOTE_ADDR']; 
        $bitacora->so = php_uname('s'); 
        $bitacora->navegador = $_SERVER['HTTP_USER_AGENT']; 
        $bitacora->usuario = 'Nombre de Usuario'; 
        $bitacora->id_usuario = Auth::id(); 
        $bitacora->save();

        return response()->json(['message' => 'Recurso actualizado y registrado en la bitácora']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bitacora $bitacora)
    {
        //
    }
}
