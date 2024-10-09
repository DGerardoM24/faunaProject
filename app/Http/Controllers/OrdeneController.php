<?php

namespace App\Http\Controllers;

use App\Models\Ordene;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\OrdeneRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class OrdeneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $ordenes = Ordene::paginate();

        return view('ordene.index', compact('ordenes'))
            ->with('i', ($request->input('page', 1) - 1) * $ordenes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $ordene = new Ordene();

        return view('ordene.create', compact('ordene'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrdeneRequest $request): RedirectResponse
    {
        Ordene::create($request->validated());

        return Redirect::route('ordenes.index')
            ->with('success', 'Ordene created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $ordene = Ordene::where('id_orden',$id)->first();

        return view('ordene.show', compact('ordene'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $ordene = Ordene::where('id_orden',$id)->first();

        return view('ordene.edit', compact('ordene'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OrdeneRequest $request, Ordene $ordene): RedirectResponse
    {
        $ordene->update($request->validated());

        return Redirect::route('ordenes.index')
            ->with('success', 'Ordene updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Ordene::where('id_orden',$id)->delete();

        return Redirect::route('ordenes.index')
            ->with('success', 'Ordene deleted successfully');
    }
}
