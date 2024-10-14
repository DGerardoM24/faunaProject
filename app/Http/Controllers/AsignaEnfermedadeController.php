<?php

namespace App\Http\Controllers;

use App\Models\AsignaEnfermedade;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\AsignaEnfermedadeRequest;
use App\Models\Enfermedade;
use App\Models\Enfermedades;
use App\Models\Especie;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class AsignaEnfermedadeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $asignaEnfermedades = AsignaEnfermedade::with('especy','enfermedade')->paginate();

        return view('asigna-enfermedade.index', compact('asignaEnfermedades'))
            ->with('i', ($request->input('page', 1) - 1) * $asignaEnfermedades->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
{
    // Obtener todas las enfermedades y especies
    $asignaEnfermedade=new AsignaEnfermedade();
    $enfermedades = Enfermedade::all(); // Asegúrate de que el modelo esté importado correctamente
    $especies = Especie::all(); // Asegúrate de que el modelo esté importado correctamente

    return view('asigna-enfermedade.create', compact('asignaEnfermedade','enfermedades', 'especies'));
}


    /**
     * Store a newly created resource in storage.
     */
    public function store(AsignaEnfermedadeRequest $request): RedirectResponse
    {
        // Validar y obtener los datos
        $data = $request->validated();

        // Crear el registro en la base de datos
        AsignaEnfermedade::create([
            'id_enfermedad' => $data['id_enfermedad'],  // Asegúrate de que el nombre del campo sea correcto
            'id_especie' => $data['id_especie'],        // Asegúrate de que el nombre del campo sea correcto
            // Agrega aquí otros campos que desees guardar
        ]);

        return Redirect::route('asigna-enfermedades.index')
            ->with('success', 'AsignaEnfermedade created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $asignaEnfermedade = AsignaEnfermedade::where('id_asigna_enfermedad', $id)->fist();

        return view('asigna-enfermedade.show', compact('asignaEnfermedade'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $asignaEnfermedade = AsignaEnfermedade::where('id_asigna_enfermedad', $id)->first();
        $enfermedades= Enfermedades::all();
        $especies= Especie::all();


        return view('asigna-enfermedade.edit', compact('asignaEnfermedade','enfermedades','especies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AsignaEnfermedadeRequest $request, AsignaEnfermedade $asignaEnfermedade): RedirectResponse
    {
        // Validar y obtener los datos
        $data = $request->validated();

        // Actualizar el registro en la base de datos
        $asignaEnfermedade->update([
            'id_enfermedad' => $data['id_enfermedad'],  // Asegúrate de que el nombre del campo sea correcto
            'id_especie' => $data['id_especie'],        // Asegúrate de que el nombre del campo sea correcto
            // Agrega aquí otros campos que desees actualizar
        ]);

        return Redirect::route('asigna-enfermedades.index')
            ->with('success', 'AsignaEnfermedade updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        AsignaEnfermedade::where('id_asigna_enfermedad', $id)->delete();

        return Redirect::route('asigna-enfermedades.index')
            ->with('success', 'AsignaEnfermedade deleted successfully');
    }
}
