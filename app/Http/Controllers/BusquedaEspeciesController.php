<?php

namespace App\Http\Controllers;

use App\Models\Especy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BusquedaEspeciesController extends Controller
{
    public function buscar(Request $request)
    {
        // Validamos el término de búsqueda
        $request->validate([
            'termino' => 'required|string|min:3',
        ]);

        // Obtenemos el término de búsqueda
        $termino = '%' . $request->input('termino') . '%';

        // Realizamos la consulta en la base de datos buscando coincidencias en los nombres
        $resultados = DB::select("
        SELECT
            especies.id_especie AS id_especie,
            especies.nombre_comun AS nombre_comun,
            especies.nombre_cientifico AS nombre_cientifico,
            especies.descripcion AS descripcion,
            especies.habitad AS habitad,
            especies.tamanio AS tamanio,
            multimedia.multimedia AS multimedia,
            familias.desc_familia AS familia,
            dietas.desc_dieta AS dieta,
            estados_conservacions.desc_estado AS estado_conservacion,
            entornos.desc_entorno AS entorno,
            banderas.desc_bandera AS bandera,
            grupos.desc_grupo AS grupo
        FROM
            especies
        JOIN
            familias ON especies.id_familia = familias.id_familia
        JOIN
            dietas ON especies.id_dieta = dietas.id_dieta
        JOIN
            estados_conservacions ON especies.id_estado_conservacion = estados_conservacions.id_estado_conservacion
        JOIN
            entornos ON especies.id_entorno = entornos.id_entorno
        JOIN
            banderas ON banderas.id_bandera = especies.id_bandera
        JOIN
            grupos ON grupos.id_grupo = especies.id_grupo
        JOIN
            asigna_multimedia ON especies.id_especie = asigna_multimedia.id_especie
        JOIN
            multimedia ON multimedia.id_multimedia = asigna_multimedia.id_imagen
        WHERE
            especies.nombre_comun LIKE ? OR especies.nombre_cientifico LIKE ?
    ", [$termino, $termino]);

        // Convertimos el array de resultados en una colección
        $resultados = collect($resultados);

        // Retornamos los resultados a la vista
        return view('resultadosBusqueda', compact('resultados', 'termino'));
    }
}
