<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Bandera
 *
 * @property $id_bandera
 * @property $nom_bandera
 * @property $desc_bandera
 * @property $created_at
 * @property $updated_at
 *
 * @property Especy[] $especies
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Bandera extends Model
{
    protected $primaryKey="id_bandera";
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['id_bandera', 'nom_bandera', 'desc_bandera'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function especies()
    {
        return $this->hasMany(\App\Models\Especy::class, 'id_bandera', 'id_bandera');
    }

}
