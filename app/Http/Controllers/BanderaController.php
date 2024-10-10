<?php

namespace App\Http\Controllers;

use App\Models\Bandera;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\BanderaRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class BanderaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $banderas = Bandera::paginate();

        return view('bandera.index', compact('banderas'))
            ->with('i', ($request->input('page', 1) - 1) * $banderas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $bandera = new Bandera();

        return view('bandera.create', compact('bandera'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BanderaRequest $request): RedirectResponse
    {
        Bandera::create($request->validated());

        return Redirect::route('banderas.index')
            ->with('success', 'Bandera created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $bandera = Bandera::where('id_bandera',$id)->first();

        return view('bandera.show', compact('bandera'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $bandera = Bandera::where('id_bandera',$id)->first();

        return view('bandera.edit', compact('bandera'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BanderaRequest $request, Bandera $bandera): RedirectResponse
    {
        $bandera->update($request->validated());

        return Redirect::route('banderas.index')
            ->with('success', 'Bandera updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Bandera::where('id_bandera',$id)->delete();

        return Redirect::route('banderas.index')
            ->with('success', 'Bandera deleted successfully');
    }
}
