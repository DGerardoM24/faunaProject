<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class EstadosConservacion
 *
 * @property $id_estado_conservacion
 * @property $desc_estado
 * @property $created_at
 * @property $updated_at
 *
 * @property Especy[] $especies
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class EstadosConservacion extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['id_estado_conservacion', 'desc_estado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function especies()
    {
        return $this->hasMany(\App\Models\Especy::class, 'id_estado_conservacion', 'id_estado_conservacion');
    }
    
}
