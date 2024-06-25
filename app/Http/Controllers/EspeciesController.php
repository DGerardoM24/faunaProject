<?php

namespace App\Http\Controllers;

use App\Models\Especie;
use Illuminate\Http\Request;

class EspeciesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Obtener todas las especies
        return view('especies.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('especies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validar la solicitud
        $request->validate([
            'nombre' => 'required|string|max:255',
            // otros campos y sus reglas de validación
        ]);

        // Crear una nueva especie
        Especie::create($request->all());

        // Redirigir a la lista de especies con un mensaje de éxito
        return redirect()->route('especies.index')
            ->with('success', 'Especie creada exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Especie  $especie
     * @return \Illuminate\Http\Response
     */
    public function show(Especie $especie)
    {
        return view('especies.show', compact('especie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Especie  $especie
     * @return \Illuminate\Http\Response
     */
    public function edit(Especie $especie)
    {
        return view('especies.edit', compact('especie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Especie  $especie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Especie $especie)
    {
        // Validar la solicitud
        $request->validate([
            'nombre' => 'required|string|max:255',
            // otros campos y sus reglas de validación
        ]);

        // Actualizar la especie
        $especie->update($request->all());

        // Redirigir a la lista de especies con un mensaje de éxito
        return redirect()->route('especies.index')
            ->with('success', 'Especie actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Especie  $especie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Especie $especie)
    {
        // Eliminar la especie
        $especie->delete();

        // Redirigir a la lista de especies con un mensaje de éxito
        return redirect()->route('especies.index')
            ->with('success', 'Especie eliminada exitosamente.');
    }
}
