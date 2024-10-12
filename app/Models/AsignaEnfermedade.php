<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AsignaEnfermedade
 *
 * @property $id_asigna_enfermedad
 * @property $id_enfermedad
 * @property $id_especie
 * @property $created_at
 * @property $updated_at
 *
 * @property Enfermedade $enfermedade
 * @property Especy $especy
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class AsignaEnfermedade extends Model
{
    protected $primaryKey='id_asigna_enfermedad';
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['id_asigna_enfermedad', 'id_enfermedad', 'id_especie'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function enfermedade()
    {
        return $this->belongsTo(\App\Models\Enfermedade::class, 'id_enfermedad', 'id_enfermedad');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function especy()
    {
        return $this->belongsTo(\App\Models\Especy::class, 'id_especie', 'id_especie');
    }

}
