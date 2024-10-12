<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AsignaMultimedia
 *
 * @property $id_asigna_multimedia
 * @property $id_imagen
 * @property $id_especie
 * @property $created_at
 * @property $updated_at
 *
 * @property Especy $especy
 * @property Multimedia $multimedia
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class AsignaMultimedia extends Model
{
    protected $primaryKey='id_asigna_multimedia';
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['id_asigna_multimedia', 'id_imagen', 'id_especie'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function especie()
    {
        return $this->belongsTo(\App\Models\Especy::class, 'id_especie', 'id_especie');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function multimedia()
    {
        return $this->belongsTo(\App\Models\Multimedia::class, 'id_imagen', 'id_multimedia');
    }

}
