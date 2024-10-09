<?php

namespace App\Http\Controllers;

use App\Models\Especy;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\EspecyRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class EspecyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $especies = Especy::paginate();

        return view('especy.index', compact('especies'))
            ->with('i', ($request->input('page', 1) - 1) * $especies->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $especy = new Especy();

        return view('especy.create', compact('especy'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EspecyRequest $request): RedirectResponse
    {
        Especy::create($request->validated());

        return Redirect::route('especies.index')
            ->with('success', 'Especy created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $especy = Especy::find($id);

        return view('especy.show', compact('especy'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $especy = Especy::find($id);

        return view('especy.edit', compact('especy'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EspecyRequest $request, Especy $especy): RedirectResponse
    {
        $especy->update($request->validated());

        return Redirect::route('especies.index')
            ->with('success', 'Especy updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Especy::find($id)->delete();

        return Redirect::route('especies.index')
            ->with('success', 'Especy deleted successfully');
    }
}
