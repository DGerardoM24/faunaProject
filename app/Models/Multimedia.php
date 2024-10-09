<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Multimedia
 *
 * @property $id_multimedia
 * @property $nombre
 * @property $multimedia
 * @property $created_at
 * @property $updated_at
 *
 * @property AsignaMultimedia[] $asignaMultimedia
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Multimedia extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['id_multimedia', 'nombre', 'multimedia'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function asignaMultimedia()
    {
        return $this->hasMany(\App\Models\AsignaMultimedia::class, 'id_multimedia', 'id_imagen');
    }
    
}
