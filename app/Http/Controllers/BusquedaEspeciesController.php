<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class BusquedaEspeciesController extends Controller
{
    public function buscar(Request $request)
    {
        // Validamos el término de búsqueda
        $request->validate([
            'termino' => ['required', 'string', 'min:3', 'regex:/^[a-zA-Z0-9\s]+$/'],
        ]);

        // Obtenemos el término de búsqueda
        $termino = '%' . trim(strtolower($request->input('termino'))) . '%';

        // Realizamos la consulta en la base de datos
        $resultados = DB::table('especies')
            ->join('familias', 'especies.id_familia', '=', 'familias.id_familia')
            ->join('dietas', 'especies.id_dieta', '=', 'dietas.id_dieta')
            ->join('estados_conservacions', 'especies.id_estado_conservacion', '=', 'estados_conservacions.id_estado_conservacion')
            ->join('entornos', 'especies.id_entorno', '=', 'entornos.id_entorno')
            ->join('banderas', 'especies.id_bandera', '=', 'banderas.id_bandera')
            ->join('grupos', 'especies.id_grupo', '=', 'grupos.id_grupo')
            ->join('asigna_multimedia', 'especies.id_especie', '=', 'asigna_multimedia.id_especie')
            ->join('multimedia', 'multimedia.id_multimedia', '=', 'asigna_multimedia.id_imagen')
            ->select(
                'especies.id_especie',
                'especies.nombre_comun',
                'especies.nombre_cientifico',
                'especies.descripcion',
                'especies.habitad',
                'especies.tamanio',
                'multimedia.multimedia',
                'familias.desc_familia as familia',
                'dietas.desc_dieta as dieta',
                'estados_conservacions.desc_estado as estado_conservacion',
                'entornos.desc_entorno as entorno',
                'banderas.desc_bandera as bandera',
                'grupos.desc_grupo as grupo'
            )
            ->where(function ($query) use ($termino) {
                $query->where('especies.nombre_comun', 'LIKE', $termino)
                    ->orWhere('especies.nombre_cientifico', 'LIKE', $termino)
                    ->orWhere('especies.descripcion', 'LIKE', $termino)
                    ->orWhere('especies.habitad', 'LIKE', $termino)
                    ->orWhere('familias.desc_familia', 'LIKE', $termino)
                    ->orWhere('dietas.desc_dieta', 'LIKE', $termino)
                    ->orWhere('estados_conservacions.desc_estado', 'LIKE', $termino)
                    ->orWhere('entornos.desc_entorno', 'LIKE', $termino)
                    ->orWhere('banderas.desc_bandera', 'LIKE', $termino)
                    ->orWhere('grupos.desc_grupo', 'LIKE', $termino);
            })
            ->get();

        // Convertimos el array de resultados en una colección
        $resultados = collect($resultados);

        // Paginamos los resultados
        $paginaActual = $request->input('page', 1);
        $resultadosPaginados = new LengthAwarePaginator(
            $resultados->forPage($paginaActual, 10),
            $resultados->count(),
            10,
            $paginaActual,
            ['path' => $request->url(), 'query' => $request->query()]
        );

        // Retornamos los resultados a la vista
        return view('resultadosBusqueda', [
            'resultados' => $resultadosPaginados,
            'termino' => str_replace('%', '', $request->input('termino')), // Limpieza del término
        ]);
    }

    public function autocompletar(Request $request)
{
    // Validamos el término de búsqueda
    $termino = trim($request->get('termino', ''));

    if (strlen($termino) < 3) {
        return response()->json([]);
    }

    // Realizamos la consulta para obtener sugerencias
    $sugerencias = DB::table('especies')
        ->join('familias', 'especies.id_familia', '=', 'familias.id_familia')
        ->join('dietas', 'especies.id_dieta', '=', 'dietas.id_dieta')
        ->join('estados_conservacions', 'especies.id_estado_conservacion', '=', 'estados_conservacions.id_estado_conservacion')
        ->join('entornos', 'especies.id_entorno', '=', 'entornos.id_entorno')
        ->join('banderas', 'especies.id_bandera', '=', 'banderas.id_bandera')
        ->join('grupos', 'especies.id_grupo', '=', 'grupos.id_grupo')
        ->select(
            'especies.nombre_comun',
            'especies.nombre_cientifico',
            'especies.descripcion',
            'especies.habitad',
            'especies.tamanio',
            'familias.desc_familia as familia',
            'dietas.desc_dieta as dieta',
            'estados_conservacions.desc_estado as estado_conservacion',
            'entornos.desc_entorno as entorno',
            'banderas.desc_bandera as bandera',
            'grupos.desc_grupo as grupo'
        )
        ->where('especies.nombre_comun', 'LIKE', '%' . $termino . '%')
        ->orWhere('especies.nombre_cientifico', 'LIKE', '%' . $termino . '%')
        ->orWhere('especies.descripcion', 'LIKE', '%' . $termino . '%')
        ->orWhere('especies.habitad', 'LIKE', '%' . $termino . '%')
        ->orWhere('familias.desc_familia', 'LIKE', '%' . $termino . '%')
        ->orWhere('dietas.desc_dieta', 'LIKE', '%' . $termino . '%')
        ->orWhere('estados_conservacions.desc_estado', 'LIKE', '%' . $termino . '%')
        ->orWhere('entornos.desc_entorno', 'LIKE', '%' . $termino . '%')
        ->orWhere('banderas.desc_bandera', 'LIKE', '%' . $termino . '%')
        ->orWhere('grupos.desc_grupo', 'LIKE', '%' . $termino . '%')
        ->limit(10)
        ->get();

    // Formateamos las sugerencias para devolverlas como JSON
    $sugerencias = $sugerencias->map(function ($item) {
        return [
            'nombre_comun' => $item->nombre_comun . ' (' . $item->nombre_cientifico . ')',
            'value' => $item->nombre_comun,
            'descripcion' => $item->descripcion,
            'habitad' => $item->habitad,
            'tamanio' => $item->tamanio,
            'familia' => $item->familia,
            'dieta' => $item->dieta,
            'estado_conservacion' => $item->estado_conservacion,
            'entorno' => $item->entorno,
            'bandera' => $item->bandera,
            'grupo' => $item->grupo,
        ];
    });

    return response()->json($sugerencias);
}

}
