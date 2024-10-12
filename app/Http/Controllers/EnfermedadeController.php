<?php

namespace App\Http\Controllers;

use App\Models\Enfermedade;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\EnfermedadeRequest;
use App\Models\TipoEnfermedade;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class EnfermedadeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        // Usar with() para cargar la relación tipoEnfermedade con eager loading
        $enfermedades = Enfermedade::with('tipoEnfermedade')->paginate();

        return view('enfermedade.index', compact('enfermedades'))
            ->with('i', ($request->input('page', 1) - 1) * $enfermedades->perPage());
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $enfermedade = new Enfermedade();
        $tipos_enfermedades = TipoEnfermedade::all(); // Cargar todos los tipos de enfermedades
        return view('enfermedade.create', compact('tipos_enfermedades', 'enfermedade'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(EnfermedadeRequest $request): RedirectResponse
    {
        // Guardar la enfermedad con el id_tipo seleccionado
        Enfermedade::create($request->validated());

        return Redirect::route('enfermedades.index')
            ->with('success', 'Enfermedad creada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $enfermedade = Enfermedade::where('id_enfermedad', $id)->first();

        return view('enfermedade.show', compact('enfermedade'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Enfermedade $enfermedade)
    {
        $tipos_enfermedades = TipoEnfermedade::all(); // Cargar todos los tipos de enfermedades
        return view('enfermedade.edit', compact('enfermedade', 'tipos_enfermedades'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(EnfermedadeRequest $request, Enfermedade $enfermedade): RedirectResponse
    {
        // Actualizar la enfermedad con el nuevo id_tipo seleccionado
        $enfermedade->update($request->validated());

        return Redirect::route('enfermedades.index')
            ->with('success', 'Enfermedad actualizada correctamente.');
    }

    public function destroy($id): RedirectResponse
    {
        Enfermedade::where('id_enfermedad', $id)->delete();

        return Redirect::route('enfermedades.index')
            ->with('success', 'Enfermedade deleted successfully');
    }
}
