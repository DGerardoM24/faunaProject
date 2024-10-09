<?php

namespace App\Http\Controllers;

use App\Models\Entorno;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\EntornoRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class EntornoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $entornos = Entorno::paginate();

        return view('entorno.index', compact('entornos'))
            ->with('i', ($request->input('page', 1) - 1) * $entornos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $entorno = new Entorno();

        return view('entorno.create', compact('entorno'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EntornoRequest $request): RedirectResponse
    {
        Entorno::create($request->validated());

        return Redirect::route('entornos.index')
            ->with('success', 'Entorno created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $entorno = Entorno::find($id);

        return view('entorno.show', compact('entorno'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $entorno = Entorno::find($id);

        return view('entorno.edit', compact('entorno'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EntornoRequest $request, Entorno $entorno): RedirectResponse
    {
        $entorno->update($request->validated());

        return Redirect::route('entornos.index')
            ->with('success', 'Entorno updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Entorno::find($id)->delete();

        return Redirect::route('entornos.index')
            ->with('success', 'Entorno deleted successfully');
    }
}
