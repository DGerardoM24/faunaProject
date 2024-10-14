<?php

namespace App\Http\Controllers;

use App\Models\AsignaRuta;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\AsignaRutaRequest;
use App\Models\Especie;
use App\Models\Ruta;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class AsignaRutaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
{
    // Eager loading de las relaciones para evitar consultas N+1
    $asignaRutas = AsignaRuta::with(['ruta', 'especy'])->paginate();

    return view('asigna-ruta.index', compact('asignaRutas'))
        ->with('i', ($request->input('page', 1) - 1) * $asignaRutas->perPage());
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rutas = Ruta::all();
        $especies = Especie::all();
        return view('asigna-ruta.create', compact('rutas', 'especies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AsignaRutaRequest $request): RedirectResponse
    {
        // Verificamos que los campos validados sean los correctos
        $validatedData = $request->validated();

        // Creamos una nueva asignación de ruta
        AsignaRuta::create([
            'id_ruta' => $validatedData['id_ruta'],
            'id_especie' => $validatedData['id_especie'],
            // Otros campos que puedan ser requeridos
        ]);

        return Redirect::route('asigna-rutas.index')
            ->with('success', 'AsignaRuta created successfully.');
    }



    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $asignaRuta = AsignaRuta::where('id_asigna_rutas', $id)->first();

        return view('asigna-ruta.show', compact('asignaRuta'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $asignaRuta = AsignaRuta::find($id);
        $rutas = Ruta::all();
        $especies = Especie::all();
        return view('asigna-ruta.edit', compact('asignaRuta', 'rutas', 'especies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AsignaRutaRequest $request, AsignaRuta $asignaRuta): RedirectResponse
    {
        try {
            // Actualizar el registro existente con los datos validados
            $asignaRuta->update($request->validated());

            return Redirect::route('asigna-rutas.index')
                ->with('success', 'AsignaRuta updated successfully');
        } catch (\Exception $e) {
            return Redirect::back()->withErrors(['error' => 'Error al actualizar la asignación de ruta.'])->withInput();
        }
    }


    public function destroy($id): RedirectResponse
    {
        AsignaRuta::where('id_asigna_rutas', $id)->delete();

        return Redirect::route('asigna-rutas.index')
            ->with('success', 'AsignaRuta deleted successfully');
    }
}
