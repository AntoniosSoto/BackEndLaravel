<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveContactoRequest;
use App\Models\Contacto;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ContactoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $contactos = Contacto::orderBy('id','asc')->paginate(50); 
        //return $contactos;
        return response()->json($contactos, Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SaveContactoRequest $request): JsonResponse
    {
        $contacto = Contacto::create($request->validated());

        return response()->json($contacto, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        $contacto = $id;

        return response()->json($contacto, Response::HTTP_OK);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contacto $contacto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SaveContactoRequest $request, string $id): JsonResponse
    {
        $contacto = Contacto::findOrFail($id);

        $contacto->update($request->validated());

        return response()->json($contacto, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        $contacto = Contacto::findOrFail($id);

        $contacto->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
