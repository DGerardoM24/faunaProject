<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Especy
 *
 * @property $id_especie
 * @property $nombre_comun
 * @property $nombre_cientifico
 * @property $descripcion
 * @property $habitad
 * @property $id_dieta
 * @property $id_familia
 * @property $id_orden
 * @property $id_clase
 * @property $id_entorno
 * @property $id_bandera
 * @property $tamanio
 * @property $id_estado_conservacion
 * @property $id_grupo
 * @property $created_at
 * @property $updated_at
 *
 * @property Bandera $bandera
 * @property Clase $clase
 * @property Dieta $dieta
 * @property Entorno $entorno
 * @property EstadosConservacion $estadosConservacion
 * @property Familia $familia
 * @property Grupo $grupo
 * @property Ordene $ordene
 * @property AsignaEnfermedade[] $asignaEnfermedades
 * @property AsignaMultimedia[] $asignaMultimedia
 * @property AsignaRuta[] $asignaRutas
 * @property Publicacione[] $publicaciones
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Especy extends Model
{
    protected $primaryKey = "id_especie";
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['id_especie', 'nombre_comun', 'nombre_cientifico', 'descripcion', 'habitad', 'id_dieta', 'id_familia', 'id_orden', 'id_clase', 'id_entorno', 'id_bandera', 'tamanio', 'id_estado_conservacion', 'id_grupo'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bandera()
    {
        return $this->belongsTo(\App\Models\Bandera::class, 'id_bandera', 'id_bandera');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function clase()
    {
        return $this->belongsTo(\App\Models\Clase::class, 'id_clase', 'id_clase');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function dieta()
    {
        return $this->belongsTo(\App\Models\Dieta::class, 'id_dieta', 'id_dieta');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function entorno()
    {
        return $this->belongsTo(\App\Models\Entorno::class, 'id_entorno', 'id_entorno');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function estadosConservacion()
    {
        return $this->belongsTo(\App\Models\EstadosConservacion::class, 'id_estado_conservacion', 'id_estado_conservacion');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function familia()
    {
        return $this->belongsTo(\App\Models\Familia::class, 'id_familia', 'id_familia');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function grupo()
    {
        return $this->belongsTo(\App\Models\Grupo::class, 'id_grupo', 'id_grupo');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ordene()
    {
        return $this->belongsTo(\App\Models\Ordene::class, 'id_orden', 'id_orden');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function asignaEnfermedades()
    {
        return $this->hasMany(\App\Models\AsignaEnfermedade::class, 'id_especie', 'id_especie');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function asignaMultimedia()
    {
        return $this->hasMany(\App\Models\AsignaMultimedia::class, 'id_especie', 'id_especie');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function asignaRutas()
    {
        return $this->hasMany(\App\Models\AsignaRuta::class, 'id_especie', 'id_especie');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function publicaciones()
    {
        return $this->hasMany(\App\Models\Publicacione::class, 'id_especie', 'id_especie');
    }

}
