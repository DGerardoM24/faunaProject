<?php

namespace App\Http\Controllers;

use App\Models\AsignaMultimedia;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\AsignaMultimediaRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class AsignaMultimediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $asignaMultimedia = AsignaMultimedia::paginate();

        return view('asigna-multimedia.index', compact('asignaMultimedia'))
            ->with('i', ($request->input('page', 1) - 1) * $asignaMultimedia->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $asignaMultimedia = new AsignaMultimedia();

        return view('asigna-multimedia.create', compact('asignaMultimedia'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AsignaMultimediaRequest $request): RedirectResponse
    {
        AsignaMultimedia::create($request->validated());

        return Redirect::route('asigna-multimedia.index')
            ->with('success', 'AsignaMultimedia created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $asignaMultimedia = AsignaMultimedia::find($id);

        return view('asigna-multimedia.show', compact('asignaMultimedia'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $asignaMultimedia = AsignaMultimedia::find($id);

        return view('asigna-multimedia.edit', compact('asignaMultimedia'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AsignaMultimediaRequest $request, AsignaMultimedia $asignaMultimedia): RedirectResponse
    {
        $asignaMultimedia->update($request->validated());

        return Redirect::route('asigna-multimedia.index')
            ->with('success', 'AsignaMultimedia updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        AsignaMultimedia::find($id)->delete();

        return Redirect::route('asigna-multimedia.index')
            ->with('success', 'AsignaMultimedia deleted successfully');
    }
}
