<?php

namespace App\Http\Controllers;

use App\Models\Sintoma;
use App\Http\Requests\SintomaRequest;

/**
 * Class SintomaController
 * @package App\Http\Controllers
 */
class SintomaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sintomas = Sintoma::paginate();

        return view('sintoma.index', compact('sintomas'))
            ->with('i', (request()->input('page', 1) - 1) * $sintomas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sintoma = new Sintoma();
        return view('sintoma.create', compact('sintoma'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SintomaRequest $request)
    {
        Sintoma::create($request->validated());

        return redirect()->route('sintomas.index')
            ->with('success', 'Sintoma created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $sintoma = Sintoma::find($id);

        return view('sintoma.show', compact('sintoma'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $sintoma = Sintoma::find($id);

        return view('sintoma.edit', compact('sintoma'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SintomaRequest $request, Sintoma $sintoma)
    {
        $sintoma->update($request->validated());

        return redirect()->route('sintomas.index')
            ->with('success', 'Sintoma updated successfully');
    }

    public function destroy($id)
    {
        Sintoma::find($id)->delete();

        return redirect()->route('sintomas.index')
            ->with('success', 'Sintoma deleted successfully');
    }
}
