<?php

namespace App\Http\Controllers;

use App\Models\Especie; // Usa Especie correctamente
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConsultaEspeciesController extends Controller
{
    // Método para mostrar todas las especies
    public function index()
    {
        $especies = DB::select("
            SELECT
                especies.id_especie AS id_especie,
                especies.nombre_comun AS Nombre_Comun,
                especies.nombre_cientifico AS Nombre_Cientifico,
                especies.descripcion AS Descripcion,
                especies.habitad AS Habitad,
                especies.tamanio AS Tamanio,
                multimedia.multimedia AS Multimedia,
                familias.desc_familia AS Familia,
                dietas.desc_dieta AS Dieta,
                estados_conservacions.desc_estado AS Estado_Conservacion,
                entornos.desc_entorno AS Entorno,
                banderas.desc_bandera AS Bandera,
                grupos.desc_grupo AS Grupo
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
        ");

        return view('vistas-especie.index', compact('especies'));
    }

    // Método para mostrar los detalles de una especie
    public function show($id_especie)
    {
        // Consulta para obtener los detalles de la especie y sus enfermedades
        $especie = DB::selectOne("
        SELECT
            especies.id_especie AS id_especie,
            especies.nombre_comun AS Nombre_Comun,
            especies.nombre_cientifico AS Nombre_Cientifico,
            especies.descripcion AS Descripcion,
            especies.habitad AS Habitad,
            especies.tamanio AS Tamanio,
            GROUP_CONCAT(enfermedades.nombre_enfermedad SEPARATOR ', ') AS Enfermedades,
            multimedia.multimedia AS Multimedia,
            familias.desc_familia AS Familia,
            dietas.desc_dieta AS Dieta,
            estados_conservacions.desc_estado AS Estado_Conservacion,
            entornos.desc_entorno AS Entorno,
            banderas.desc_bandera AS Bandera,
            grupos.desc_grupo AS Grupo
        FROM
            especies
        LEFT JOIN
            familias ON especies.id_familia = familias.id_familia
        LEFT JOIN
            dietas ON especies.id_dieta = dietas.id_dieta
        LEFT JOIN
            estados_conservacions ON especies.id_estado_conservacion = estados_conservacions.id_estado_conservacion
        LEFT JOIN
            entornos ON especies.id_entorno = entornos.id_entorno
        LEFT JOIN
            banderas ON banderas.id_bandera = especies.id_bandera
        LEFT JOIN
            grupos ON grupos.id_grupo = especies.id_grupo
        LEFT JOIN
            asigna_multimedia ON especies.id_especie = asigna_multimedia.id_especie
        LEFT JOIN
            multimedia ON multimedia.id_multimedia = asigna_multimedia.id_imagen
        LEFT JOIN
            asigna_enfermedades ON especies.id_especie = asigna_enfermedades.id_especie
        LEFT JOIN
            enfermedades ON enfermedades.id_enfermedad = asigna_enfermedades.id_enfermedad
        WHERE
            especies.id_especie = ?
        GROUP BY
            especies.id_especie,
            especies.nombre_comun,
            especies.nombre_cientifico,
            especies.descripcion,
            especies.habitad,
            especies.tamanio,
            multimedia.multimedia,
            familias.desc_familia,
            dietas.desc_dieta,
            estados_conservacions.desc_estado,
            entornos.desc_entorno,
            banderas.desc_bandera,
            grupos.desc_grupo
    ", [$id_especie]);

        $especief = DB::selectOne("
    SELECT
            enfermedades.nombre_enfermedad AS Enfermedades
        FROM
            especies
        LEFT JOIN
            familias ON especies.id_familia = familias.id_familia
        LEFT JOIN
            dietas ON especies.id_dieta = dietas.id_dieta
        LEFT JOIN
            estados_conservacions ON especies.id_estado_conservacion = estados_conservacions.id_estado_conservacion
        LEFT JOIN
            entornos ON especies.id_entorno = entornos.id_entorno
        LEFT JOIN
            banderas ON banderas.id_bandera = especies.id_bandera
        LEFT JOIN
            grupos ON grupos.id_grupo = especies.id_grupo
        LEFT JOIN
            asigna_multimedia ON especies.id_especie = asigna_multimedia.id_especie
        LEFT JOIN
            multimedia ON multimedia.id_multimedia = asigna_multimedia.id_imagen
        LEFT JOIN
            asigna_enfermedades ON especies.id_especie = asigna_enfermedades.id_especie
        LEFT JOIN
            enfermedades ON enfermedades.id_enfermedad = asigna_enfermedades.id_enfermedad
        WHERE
            especies.id_especie = ?
", [$id_especie]);

        // Verificar si la especie fue encontrada
        if (!$especie) {
            abort(404, 'Especie no encontrada');
        }

        return view('vistas-especie.show', compact('especie', 'especief'));
    }
}
