<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Familia
 *
 * @property $id_familia
 * @property $desc_familia
 * @property $created_at
 * @property $updated_at
 *
 * @property Especy[] $especies
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Familia extends Model
{
    protected $primaryKey='id_familia';
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['id_familia', 'desc_familia'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function especies()
    {
        return $this->hasMany(\App\Models\Especy::class, 'id_familia', 'id_familia');
    }

}
