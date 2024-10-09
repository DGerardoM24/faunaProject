<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TipoEnfermedade
 *
 * @property $id_tipo
 * @property $desc_tipo
 * @property $created_at
 * @property $updated_at
 *
 * @property Enfermedade[] $enfermedades
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class TipoEnfermedade extends Model
{

    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['id_tipo', 'desc_tipo'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function enfermedades()
    {
        return $this->hasMany(Enfermedade::class, 'id_tipo');
    }

}
