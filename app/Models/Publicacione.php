<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Publicacione
 *
 * @property $id_publicacion
 * @property $titulo
 * @property $id_especie
 * @property $fecha_p
 * @property $id
 * @property $created_at
 * @property $updated_at
 *
 * @property Especy $especy
 * @property User $user
 * @property AsignaComentario[] $asignaComentarios
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Publicacione extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['id_publicacion', 'titulo', 'id_especie', 'fecha_p'];


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
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function asignaComentarios()
    {
        return $this->hasMany(\App\Models\AsignaComentario::class, 'id_publicacion', 'id_publicacion');
    }
    
}
