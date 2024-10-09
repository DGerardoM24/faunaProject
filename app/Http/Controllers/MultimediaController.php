<?php

namespace App\Http\Controllers;

use App\Models\Multimedia;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\MultimediaRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
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
    $data = $request->validated();

    // Verifica si hay un archivo de imagen en la solicitud
    if ($request->hasFile('multimedia')) {
        $file = $request->file('multimedia');

        // Almacena el archivo en 'public/multimedia' y guarda el nombre del archivo
        $filePath = $file->store('multimedia', 'public');

        // Guarda la ruta del archivo en la base de datos
        $data['multimedia'] = $filePath;
    }

    // Crea el nuevo registro en la base de datos
    Multimedia::create($data);

    return Redirect::route('multimedia.index')
        ->with('success', 'Multimedia created successfully.');
}


    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $multimedia = Multimedia::where('id_multimedia', $id)->first();

        return view('multimedia.show', compact('multimedia'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $multimedia = Multimedia::where('id_multimedia', $id)->first();

        return view('multimedia.edit', compact('multimedia'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MultimediaRequest $request, Multimedia $multimedia): RedirectResponse
    {
        $validatedData = $request->validated();

        // Verificamos si se subió un nuevo archivo multimedia
        if ($request->hasFile('multimedia')) {
            // Almacenamos el nuevo archivo
            $path = $request->file('multimedia')->store('public/multimedia');

            // Eliminamos el archivo anterior si existe
            if ($multimedia->multimedia) {
                Storage::delete('public/multimedia/' . $multimedia->multimedia);
            }

            // Actualizamos el campo multimedia con el nuevo archivo
            $validatedData['multimedia'] = basename($path);
        }

        // Actualizamos los datos de la base de datos
        $multimedia->update($validatedData);

        return Redirect::route('multimedia.index')
            ->with('success', 'Multimedia updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        $multimedia = Multimedia::where('id_multimedia', $id)->first();

        // Eliminamos el archivo multimedia si existe
        if ($multimedia->multimedia) {
            Storage::delete('public/multimedia/' . $multimedia->multimedia);
        }

        // Eliminamos el registro de la base de datos
        $multimedia->delete();

        return Redirect::route('multimedia.index')
            ->with('success', 'Multimedia deleted successfully');
    }
}
