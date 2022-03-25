<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Inf
 *
 * @property $id
 * @property $user_id
 * @property $user_cedula
 * @property $fecha_diag
 * @property $nombre_enf
 * @property $obs_cli
 * @property $fecha_reg
 * @property $observaciones
 * @property $created_at
 * @property $updated_at
 *
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Inf extends Model
{
    
    static $rules = [
		'fecha_diag' => 'required',
		'nombre_enf' => 'required',
		'fecha_reg' => 'required',
		'observaciones' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id','user_cedula','fecha_diag','nombre_enf','obs_cli','fecha_reg','observaciones'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
    

}
