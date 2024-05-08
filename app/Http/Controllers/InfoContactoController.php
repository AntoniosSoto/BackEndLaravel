<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InfoContacto;

class InfoContactoController extends Controller
{
    /**
     * Muestra la información de contacto por el ID del contacto.
     *
     * @param  int  $contacto_id
     * @return \Illuminate\Http\Response
     */
    public function show($contacto_id)
    {
        $infoContacto = InfoContacto::where('contacto_id', $contacto_id)->get();
        return response()->json($infoContacto);
    }

    /**
     * Almacena un nuevo detalle de contacto en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'contacto_id' => 'required|exists:contactos,id',
            'telefono' => 'nullable|string|max:15',
            'correo' => 'nullable|email|max:50',
            'direccion' => 'nullable|string',
        ]);

        $infoContacto = InfoContacto::create($request->all());
        return response()->json($infoContacto, 201);
    }
}
