<?php

namespace App\Http\Controllers;

use App\Models\Especy;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\EspecyRequest;
use App\Models\Bandera;
use App\Models\Clase;
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
    public function index(Request $request): View
    {
        $especies = Especy::paginate();

        return view('especy.index', compact('especies'))
            ->with('i', ($request->input('page', 1) - 1) * $especies->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Obtener las colecciones para los selectores
        $banderas = Bandera::all(); // Modelo Bandera
        $estados_conservacion = EstadosConservacion::all(); // Modelo EstadoConservacion
        $clases = Clase::all(); // Modelo Clase
        $entornos = Entorno::all(); // Modelo Entorno
        $grupos = Grupo::all(); // Modelo Grupo
        $ordenes = Ordene::all(); // Modelo Orden
        $familias = Familia::all(); // Modelo Familia

        // Pasar las colecciones a la vista
        return view('especies.create', compact('banderas', 'estados_conservacion', 'clases', 'entornos', 'grupos', 'ordenes', 'familias'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos
        $request->validate([
            'nombre' => 'required|string|max:255',
            'id_bandera' => 'required|exists:banderas,id_bandera',
            'id_estado_conservacion' => 'required|exists:estados_conservacion,id_estado_conservacion',
            'id_clase' => 'required|exists:clases,id_clase',
            'id_entorno' => 'required|exists:entornos,id_entorno',
            'id_grupo' => 'required|exists:grupos,id_grupo',
            'id_orden' => 'required|exists:ordenes,id_orden',
            'id_familia' => 'required|exists:familias,id_familia',
            // Otros campos adicionales...
        ]);

        // Crear una nueva especie
        Especy::create([
            'nombre' => $request->nombre,
            'id_bandera' => $request->id_bandera,
            'id_estado_conservacion' => $request->id_estado_conservacion,
            'id_clase' => $request->id_clase,
            'id_entorno' => $request->id_entorno,
            'id_grupo' => $request->id_grupo,
            'id_orden' => $request->id_orden,
            'id_familia' => $request->id_familia,
            // Otros campos adicionales...
        ]);

        // Redirigir o mostrar mensaje de éxito
        return redirect()->route('especies.index')->with('success', 'Especie creada con éxito');
    }


    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $especy = Especy::where('id_especie', $id)->first();

        return view('especy.show', compact('especy'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Especy $especy)
    {
        // Obtener las colecciones para los selectores
        $banderas = Bandera::all();
        $estados_conservacion = EstadosConservacion::all();
        $clases = Clase::all();
        $entornos = Entorno::all();
        $grupos = Grupo::all();
        $ordenes = Ordene::all();
        $familias = Familia::all();

        // Pasar las colecciones y la especie a la vista
        return view('especies.edit', compact('especy', 'banderas', 'estados_conservacion', 'clases', 'entornos', 'grupos', 'ordenes', 'familias'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Especy $especy)
{
    // Validar los datos
    $request->validate([
        'nombre' => 'required|string|max:255',
        'id_bandera' => 'required|exists:banderas,id_bandera',
        'id_estado_conservacion' => 'required|exists:estados_conservacion,id_estado_conservacion',
        'id_clase' => 'required|exists:clases,id_clase',
        'id_entorno' => 'required|exists:entornos,id_entorno',
        'id_grupo' => 'required|exists:grupos,id_grupo',
        'id_orden' => 'required|exists:ordenes,id_orden',
        'id_familia' => 'required|exists:familias,id_familia',
        // Otros campos adicionales...
    ]);

    // Actualizar la especie
    $especy->update([
        'nombre' => $request->nombre,
        'id_bandera' => $request->id_bandera,
        'id_estado_conservacion' => $request->id_estado_conservacion,
        'id_clase' => $request->id_clase,
        'id_entorno' => $request->id_entorno,
        'id_grupo' => $request->id_grupo,
        'id_orden' => $request->id_orden,
        'id_familia' => $request->id_familia,
        // Otros campos adicionales...
    ]);

    // Redirigir o mostrar mensaje de éxito
    return redirect()->route('especies.index')->with('success', 'Especie actualizada con éxito');
}


    public function destroy($id): RedirectResponse
    {
        Especy::where('id_especie', $id)->delete();

        return Redirect::route('especies.index')
            ->with('success', 'Especy deleted successfully');
    }
}
