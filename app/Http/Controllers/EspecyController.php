<?php

namespace App\Http\Controllers;

use App\Models\Especy;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\EspecyRequest;
use App\Models\Bandera;
use App\Models\Clase;
use App\Models\Dieta;
use App\Models\Entorno;
use App\Models\EstadosConservacion;
use App\Models\Familia;
use App\Models\Grupo;
use App\Models\Ordene;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class EspecyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Carga las especies con las relaciones necesarias
        $especies = Especy::with(['dieta', 'familia', 'ordene', 'clase', 'entorno', 'bandera', 'estadosConservacion', 'grupo'])->paginate(10);

        return view('especy.index', compact('especies'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $especy = new Especy();
        $dietas = Dieta::all();
        $banderas = Bandera::all(); // Modelo Bandera
        $estados_conservacions = EstadosConservacion::all(); // Modelo EstadoConservacion
        $clases = Clase::all(); // Modelo Clase
        $entornos = Entorno::all(); // Modelo Entorno
        $grupos = Grupo::all(); // Modelo Grupo
        $ordenes = Ordene::all(); // Modelo Orden
        $familias = Familia::all(); // Modelo Familia

        // Pasar las colecciones a la vista
        return view('especy.create', compact('especy', 'dietas', 'banderas', 'estados_conservacions', 'clases', 'entornos', 'grupos', 'ordenes', 'familias'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(EspecyRequest $request): RedirectResponse
    {
        // Crear una nueva especie usando los datos validados
        Especy::create($request->validated());

        // Redirigir o mostrar mensaje de éxito
        return redirect()->route('especy.index')->with('success', 'Especie creada con éxito');
    }


    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $especy = Especy::with([
            'dieta',
            'familia',
            'ordene',
            'clase',
            'entorno',
            'bandera',
            'estadosConservacion',
            'grupo'
        ])->where('id_especie', $id)->first();

        return view('especy.show', compact('especy'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $especy = Especy::where('id_especie', $id)->first();
        // Encuentra el registro que necesitas
        $dietas = Dieta::all(); // Pasa las dietas u otros datos necesarios también
        $banderas = Bandera::all();
        $estados_conservacions = EstadosConservacion::all();
        $clases = Clase::all();
        $entornos = Entorno::all();
        $grupos = Grupo::all();
        $ordenes = Ordene::all();
        $familias = Familia::all();

        // Pasar las colecciones y la especie a la vista
        return view('especy.edit', compact('dietas', 'especy', 'banderas', 'estados_conservacions', 'clases', 'entornos', 'grupos', 'ordenes', 'familias'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(EspecyRequest $request, Especy $especy): RedirectResponse
    {
        // Actualizar la especie usando los datos validados
        $especy->update($request->validated());
        // Redirigir o mostrar mensaje de éxito
        return redirect()->route('especies.index')->with('success', 'Especie creada con éxito');
    }

    public function destroy($id): RedirectResponse
    {
        Especy::where('id_especie', $id)->delete();
        return redirect()->route('especies.index')
            ->with('success', 'Especie eliminada con éxito');
    }
}
