<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Comentario
 *
 * @property $id_comentario
 * @property $desc_comentario
 * @property $id
 * @property $created_at
 * @property $updated_at
 *
 * @property User $user
 * @property AsignaComentario[] $asignaComentarios
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Comentario extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['id_comentario', 'desc_comentario'];


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
        return $this->hasMany(\App\Models\AsignaComentario::class, 'id_comentario', 'id_comentario');
    }
    
}
