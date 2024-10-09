<?php

namespace App\Http\Controllers;

use App\Models\Multimedia;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\MultimediaRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class MultimediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $multimedia = Multimedia::paginate();

        return view('multimedia.index', compact('multimedia'))
            ->with('i', ($request->input('page', 1) - 1) * $multimedia->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $multimedia = new Multimedia();

        return view('multimedia.create', compact('multimedia'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MultimediaRequest $request): RedirectResponse
    {
        Multimedia::create($request->validated());

        return Redirect::route('multimedia.index')
            ->with('success', 'Multimedia created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $multimedia = Multimedia::find($id);

        return view('multimedia.show', compact('multimedia'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $multimedia = Multimedia::find($id);

        return view('multimedia.edit', compact('multimedia'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MultimediaRequest $request, Multimedia $multimedia): RedirectResponse
    {
        $multimedia->update($request->validated());

        return Redirect::route('multimedia.index')
            ->with('success', 'Multimedia updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Multimedia::find($id)->delete();

        return Redirect::route('multimedia.index')
            ->with('success', 'Multimedia deleted successfully');
    }
}
