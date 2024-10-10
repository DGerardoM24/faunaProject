<?php

namespace App\Http\Controllers;

use App\Models\TipoEnfermedade;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\TipoEnfermedadeRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class TipoEnfermedadeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $tipoEnfermedades = TipoEnfermedade::paginate();

        return view('tipo-enfermedade.index', compact('tipoEnfermedades'))
            ->with('i', ($request->input('page', 1) - 1) * $tipoEnfermedades->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $tipoEnfermedade = new TipoEnfermedade();

        return view('tipo-enfermedade.create', compact('tipoEnfermedade'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TipoEnfermedadeRequest $request): RedirectResponse
    {
        TipoEnfermedade::create($request->validated());

        return Redirect::route('tipo-enfermedades.index')
            ->with('success', 'TipoEnfermedade created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $tipoEnfermedade = TipoEnfermedade::where('id_tipo',$id)->first();

        return view('tipo-enfermedade.show', compact('tipoEnfermedade'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $tipoEnfermedade = TipoEnfermedade::where('id_tipo',$id)->first();

        return view('tipo-enfermedade.edit', compact('tipoEnfermedade'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TipoEnfermedadeRequest $request, TipoEnfermedade $tipoEnfermedade): RedirectResponse
    {
        $tipoEnfermedade->update($request->validated());

        return Redirect::route('tipo-enfermedades.index')
            ->with('success', 'TipoEnfermedade updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        TipoEnfermedade::where('id_tipo',$id)->delete();

        return Redirect::route('tipo-enfermedades.index')
            ->with('success', 'TipoEnfermedade deleted successfully');
    }
}
