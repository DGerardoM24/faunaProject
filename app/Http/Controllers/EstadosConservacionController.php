<?php

namespace App\Http\Controllers;

use App\Models\EstadosConservacion;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\EstadosConservacionRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class EstadosConservacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $estadosConservacions = EstadosConservacion::paginate();

        return view('estados-conservacion.index', compact('estadosConservacions'))
            ->with('i', ($request->input('page', 1) - 1) * $estadosConservacions->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $estadosConservacion = new EstadosConservacion();

        return view('estados-conservacion.create', compact('estadosConservacion'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EstadosConservacionRequest $request): RedirectResponse
    {
        EstadosConservacion::create($request->validated());

        return Redirect::route('estados-conservacions.index')
            ->with('success', 'EstadosConservacion created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $estadosConservacion = EstadosConservacion::where('id_estado_conservacion',$id)->first();

        return view('estados-conservacion.show', compact('estadosConservacion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $estadosConservacion = EstadosConservacion::where('id_estado_conservacion',$id)->first();

        return view('estados-conservacion.edit', compact('estadosConservacion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EstadosConservacionRequest $request, EstadosConservacion $estadosConservacion): RedirectResponse
    {
        $estadosConservacion->update($request->validated());

        return Redirect::route('estados-conservacions.index')
            ->with('success', 'EstadosConservacion updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        EstadosConservacion::where('id_estado_conservacion',$id)->delete();

        return Redirect::route('estados-conservacions.index')
            ->with('success', 'EstadosConservacion deleted successfully');
    }
}
