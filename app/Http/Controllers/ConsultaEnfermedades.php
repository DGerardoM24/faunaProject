<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConsultaEnfermedades extends Controller
{
    public function index()
    {
        $enfermedades =
            DB::select('
        SELECT
    enfermedades.nombre_enfermedad AS Enfermedades,
    enfermedades.descripcion AS Descripcion,
    enfermedades.transmision AS Transmicion,
    tipo_enfermedades.desc_tipo as Tipo
        FROM enfermedades
            LEFT JOIN
        tipo_enfermedades ON enfermedades.id_tipo = tipo_enfermedades.id_tipo
        ');
        return view('vistas-enfermedades.index', compact('enfermedades'));
    }
}
