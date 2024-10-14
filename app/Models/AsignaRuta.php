<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AsignaRuta
 *
 * @property $id_asigna_rutas
 * @property $id_ruta
 * @property $id_especie
 *
 * @property Especy $especy
 * @property Ruta $ruta
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class AsignaRuta extends Model
{
    protected $primaryKey='id_asigna_rutas';
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['id_asigna_rutas', 'id_ruta', 'id_especie'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function especy()
    {
        return $this->belongsTo(\App\Models\Especy::class, 'id_especie', 'id_especie');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ruta()
    {
        return $this->belongsTo(\App\Models\Ruta::class, 'id_ruta', 'id_ruta');
    }
}
