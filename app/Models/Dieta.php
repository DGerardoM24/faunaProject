<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Dieta
 *
 * @property $id_dieta
 * @property $desc_dieta
 * @property $created_at
 * @property $updated_at
 *
 * @property Especy[] $especies
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Dieta extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['id_dieta', 'desc_dieta'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function especies()
    {
        return $this->hasMany(\App\Models\Especy::class, 'id_dieta', 'id_dieta');
    }
    
}
