<?php

namespace App\Http\Controllers;

use App\Models\AsignaComentario;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\AsignaComentarioRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class AsignaComentarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $asignaComentarios = AsignaComentario::paginate();

        return view('asigna-comentario.index', compact('asignaComentarios'))
            ->with('i', ($request->input('page', 1) - 1) * $asignaComentarios->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $asignaComentario = new AsignaComentario();

        return view('asigna-comentario.create', compact('asignaComentario'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AsignaComentarioRequest $request): RedirectResponse
    {
        AsignaComentario::create($request->validated());

        return Redirect::route('asigna-comentarios.index')
            ->with('success', 'AsignaComentario created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $asignaComentario = AsignaComentario::find($id);

        return view('asigna-comentario.show', compact('asignaComentario'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $asignaComentario = AsignaComentario::find($id);

        return view('asigna-comentario.edit', compact('asignaComentario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AsignaComentarioRequest $request, AsignaComentario $asignaComentario): RedirectResponse
    {
        $asignaComentario->update($request->validated());

        return Redirect::route('asigna-comentarios.index')
            ->with('success', 'AsignaComentario updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        AsignaComentario::find($id)->delete();

        return Redirect::route('asigna-comentarios.index')
            ->with('success', 'AsignaComentario deleted successfully');
    }
}
