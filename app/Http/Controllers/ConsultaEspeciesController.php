<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Importar el facade DB

class ConsultaEspeciesController extends Controller
{
    public function index()
    {
        $especies = DB::select("
            SELECT
    especies.nombre_comun AS Nombre_Comun,
    especies.nombre_cientifico AS Nombre_Cientifico,
    especies.descripcion AS Descripcion,
    especies.habitad AS Habitad,
    especies.tamanio AS Tamanio,
    multimedia.multimedia AS Multimedia, -- Incluye la imagen de la especie
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
    multimedia ON multimedia.id_multimedia = asigna_multimedia.id_imagen -- Corregido para enlazar multimedia

        ");
        return view('vistas-especie.index', compact('especies'));
    }
}
