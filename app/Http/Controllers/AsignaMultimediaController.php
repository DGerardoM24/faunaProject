<?php

namespace App\Http\Controllers;

use App\Models\AsignaMultimedia;
use App\Models\Multimedia; // Modelo Multimedia
use App\Models\Especie; // Modelo Especie
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\AsignaMultimediaRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class AsignaMultimediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        // Consulta con las relaciones a Especie y Multimedia
        $asignaMultimedia = AsignaMultimedia::with(['especie', 'multimedia'])->paginate();

        return view('asigna-multimedia.index', compact('asignaMultimedia'))
            ->with('i', ($request->input('page', 1) - 1) * $asignaMultimedia->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $asignaMultimedia = new AsignaMultimedia();
        $multimedia = Multimedia::all(); // Consultar todas las multimedia disponibles
        $especies = Especie::all(); // Consultar todas las especies disponibles

        return view('asigna-multimedia.create', compact('asignaMultimedia', 'multimedia', 'especies')); // Pasar multimedia y especies a la vista
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los campos
        $request->validate([
            'id_imagen' => 'required|exists:multimedia,id_multimedia',
            'id_especie' => 'required|exists:especies,id_especie',
        ]);

        // Crear una nueva instancia de AsignaMultimedia
        $asignaMultimedia = new AsignaMultimedia();

        // Asignar los valores del formulario
        $asignaMultimedia->id_imagen = $request->input('id_imagen');
        $asignaMultimedia->id_especie = $request->input('id_especie');

        // Guardar en la base de datos
        $asignaMultimedia->save();

        // Redirigir con éxito
        return redirect()->route('asigna_multimedia.index')->with('success', 'Multimedia asignada correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $asignaMultimedia = AsignaMultimedia::find($id);

        return view('asigna-multimedia.show', compact('asignaMultimedia'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $asignaMultimedia = AsignaMultimedia::find($id);
        $multimedia = Multimedia::all(); // Consultar todas las multimedia disponibles
        $especies = Especie::all(); // Consultar todas las especies disponibles

        return view('asigna-multimedia.edit', compact('asignaMultimedia', 'multimedia', 'especies')); // Pasar multimedia y especies a la vista de edición
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_imagen' => 'required|exists:multimedia,id_multimedia',
            'id_especie' => 'required|exists:especies,id_especie',
        ]);

        $asignaMultimedia = AsignaMultimedia::findOrFail($id);

        // Si se subió una nueva imagen

        // Actualiza la especie
        $asignaMultimedia->id_especie = $request->id_especie;
        $asignaMultimedia->id_imagen = $request->id_imagen;
        $asignaMultimedia->save();

        return redirect()->route('asigna-multimedia.index')->with('success', 'Multimedia actualizada correctamente.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        AsignaMultimedia::find($id)->delete();

        return Redirect::route('asigna-multimedia.index')
            ->with('success', 'AsignaMultimedia deleted successfully');
    }
}
