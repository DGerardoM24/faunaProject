<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Entorno
 *
 * @property $id_entorno
 * @property $desc_entorno
 * @property $created_at
 * @property $updated_at
 *
 * @property Especy[] $especies
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Entorno extends Model
{
    protected $primaryKey='id_entorno';
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['id_entorno', 'desc_entorno'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function especies()
    {
        return $this->hasMany(\App\Models\Especy::class, 'id_entorno', 'id_entorno');
    }

}
