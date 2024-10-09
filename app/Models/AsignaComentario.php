<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AsignaComentario
 *
 * @property $id_asigna_comentario
 * @property $id_comentario
 * @property $id_publicacion
 * @property $created_at
 * @property $updated_at
 *
 * @property Comentario $comentario
 * @property Publicacione $publicacione
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class AsignaComentario extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['id_asigna_comentario', 'id_comentario', 'id_publicacion'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function comentario()
    {
        return $this->belongsTo(\App\Models\Comentario::class, 'id_comentario', 'id_comentario');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function publicacione()
    {
        return $this->belongsTo(\App\Models\Publicacione::class, 'id_publicacion', 'id_publicacion');
    }
    
}
