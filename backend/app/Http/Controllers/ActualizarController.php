<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActualizarController extends Controller


{
    
    public function update(Request $request)
    {
        $id_rol = $request->input('id_rol');
        $id_pagina = $request->input('id_pagina');
        $id_enlace = $request->input('id_enlace');

        $datos_rol = [
            'id' => $request->input('id'),
            'rol' => $request->input('rol'),
        ];

        $datos_pagina = [
            'url' => $request->input('url'),
            'icono' => $request->input('icono'),
        ];

        $datos_enlace = [
            'descripcion' => $request->input('descripcion'),
        ];

        $this->actualizarJSON('http://127.0.0.1:8000/api/rols/' . $id_rol, $datos_rol);
        $this->actualizarJSON('http://127.0.0.1:8000/api/paginas/' . $id_pagina, $datos_pagina);
        $this->actualizarJSON('http://127.0.0.1:8000/api/enlaces/' . $id_enlace, $datos_enlace);

        // Puedes retornar una respuesta de éxito si lo deseas
        return response()->json(['mensaje' => 'Actualización exitosa']);
    }

    function actualizarJSON($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            // Asegúrate de enviar los encabezados adecuados para indicar que estás enviando JSON
        ]);

        $response = curl_exec($ch);

        if ($response === false) {
            // Manejar el error y devolver una respuesta adecuada
            return response()->json(['error' => curl_error($ch)], 500);
        } else {
            $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            if ($http_code !== 200) {
                // Manejar el error y devolver una respuesta adecuada
                return response()->json(['error' => 'Error en la solicitud. Código HTTP: ' . $http_code], $http_code);
            } else {
                // Devolver una respuesta de éxito
                return response()->json(['mensaje' => 'Actualización exitosa']);
            }
        }

        curl_close($ch);
    }
}
