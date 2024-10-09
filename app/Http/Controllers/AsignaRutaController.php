<?php

namespace App\Http\Controllers;

use App\Models\AsignaRuta;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\AsignaRutaRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class AsignaRutaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $asignaRutas = AsignaRuta::paginate();

        return view('asigna-ruta.index', compact('asignaRutas'))
            ->with('i', ($request->input('page', 1) - 1) * $asignaRutas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $asignaRuta = new AsignaRuta();

        return view('asigna-ruta.create', compact('asignaRuta'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AsignaRutaRequest $request): RedirectResponse
    {
        AsignaRuta::create($request->validated());

        return Redirect::route('asigna-rutas.index')
            ->with('success', 'AsignaRuta created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $asignaRuta = AsignaRuta::find($id);

        return view('asigna-ruta.show', compact('asignaRuta'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $asignaRuta = AsignaRuta::find($id);

        return view('asigna-ruta.edit', compact('asignaRuta'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AsignaRutaRequest $request, AsignaRuta $asignaRuta): RedirectResponse
    {
        $asignaRuta->update($request->validated());

        return Redirect::route('asigna-rutas.index')
            ->with('success', 'AsignaRuta updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        AsignaRuta::find($id)->delete();

        return Redirect::route('asigna-rutas.index')
            ->with('success', 'AsignaRuta deleted successfully');
    }
}
