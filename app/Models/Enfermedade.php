<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Enfermedade
 *
 * @property $id_enfermedad
 * @property $nombre_enfermedad
 * @property $descripcion
 * @property $transmision
 * @property $id_tipo
 * @property $created_at
 * @property $updated_at
 *
 * @property TipoEnfermedade $tipoEnfermedade
 * @property AsignaEnfermedade[] $asignaEnfermedades
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Enfermedade extends Model
{
    protected $primaryKey='id_enfermedad';
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['id_enfermedad', 'nombre_enfermedad', 'descripcion', 'transmision', 'id_tipo'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tipoEnfermedade()
    {
        return $this->belongsTo(TipoEnfermedade::class, 'id_tipo');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function asignaEnfermedades()
    {
        return $this->hasMany(\App\Models\AsignaEnfermedade::class, 'id_enfermedad', 'id_enfermedad');
    }

}
