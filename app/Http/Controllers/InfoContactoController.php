<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use Illuminate\Http\Request;
use App\Models\InfoContacto;
use Illuminate\Http\Response;

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
        $informacionCompleta = Contacto::join('info_contactos', 'contactos.id', '=', 'info_contactos.contacto_id')
        ->where('contactos.id', $contacto_id)
        ->select('info_contactos.telefono', 'info_contactos.correo', 'info_contactos.direccion')
        ->orderBy('info_contactos.id','desc')
        ->get();

        return response()->json($informacionCompleta, Response::HTTP_OK);
    }

    /**
     * Almacena un nuevo detalle de contacto en la base de datos.
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
