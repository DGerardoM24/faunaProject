<?php

namespace App\Http\Controllers;

use App\Models\AsignaEnfermedade;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\AsignaEnfermedadeRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class AsignaEnfermedadeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $asignaEnfermedades = AsignaEnfermedade::paginate();

        return view('asigna-enfermedade.index', compact('asignaEnfermedades'))
            ->with('i', ($request->input('page', 1) - 1) * $asignaEnfermedades->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $asignaEnfermedade = new AsignaEnfermedade();

        return view('asigna-enfermedade.create', compact('asignaEnfermedade'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AsignaEnfermedadeRequest $request): RedirectResponse
    {
        AsignaEnfermedade::create($request->validated());

        return Redirect::route('asigna-enfermedades.index')
            ->with('success', 'AsignaEnfermedade created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $asignaEnfermedade = AsignaEnfermedade::find($id);

        return view('asigna-enfermedade.show', compact('asignaEnfermedade'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $asignaEnfermedade = AsignaEnfermedade::find($id);

        return view('asigna-enfermedade.edit', compact('asignaEnfermedade'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AsignaEnfermedadeRequest $request, AsignaEnfermedade $asignaEnfermedade): RedirectResponse
    {
        $asignaEnfermedade->update($request->validated());

        return Redirect::route('asigna-enfermedades.index')
            ->with('success', 'AsignaEnfermedade updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        AsignaEnfermedade::find($id)->delete();

        return Redirect::route('asigna-enfermedades.index')
            ->with('success', 'AsignaEnfermedade deleted successfully');
    }
}
