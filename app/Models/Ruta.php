<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Ruta
 *
 * @property $id_ruta
 * @property $desc_ruta
 * @property $rango
 * @property $created_at
 * @property $updated_at
 *
 * @property AsignaRuta[] $asignaRutas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Ruta extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['id_ruta', 'desc_ruta', 'rango'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function asignaRutas()
    {
        return $this->hasMany(\App\Models\AsignaRuta::class, 'id_ruta', 'id_ruta');
    }
    
}
