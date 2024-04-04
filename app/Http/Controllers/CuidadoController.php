<?php

namespace App\Http\Controllers;

use App\Models\Cuidado;
use App\Http\Requests\CuidadoRequest;

/**
 * Class CuidadoController
 * @package App\Http\Controllers
 */
class CuidadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cuidados = Cuidado::paginate();

        return view('cuidado.index', compact('cuidados'))
            ->with('i', (request()->input('page', 1) - 1) * $cuidados->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cuidado = new Cuidado();
        return view('cuidado.create', compact('cuidado'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CuidadoRequest $request)
    {
        Cuidado::create($request->validated());

        return redirect()->route('cuidados.index')
            ->with('success', 'Cuidado created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $cuidado = Cuidado::find($id);

        return view('cuidado.show', compact('cuidado'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $cuidado = Cuidado::find($id);

        return view('cuidado.edit', compact('cuidado'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CuidadoRequest $request, Cuidado $cuidado)
    {
        $cuidado->update($request->validated());

        return redirect()->route('cuidados.index')
            ->with('success', 'Cuidado updated successfully');
    }

    public function destroy($id)
    {
        Cuidado::find($id)->delete();

        return redirect()->route('cuidados.index')
            ->with('success', 'Cuidado deleted successfully');
    }
}
