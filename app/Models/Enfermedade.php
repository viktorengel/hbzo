<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Enfermedade
 *
 * @property $id
 * @property $fecha_diag
 * @property $nombre_enf
 * @property $obs_cli
 * @property $fecha_reg
 * @property $observaciones
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */

 
class Enfermedade extends Model
{
    
  public function enfermedadades()
  {
    return $this->belongsToMany(User::class,'specialty_user')->withTimestamps();
  }

    static $rules = [
		'fecha_diag' => 'required',
		'nombre_enf' => 'required',
		'obs_cli' => 'required',
		'fecha_reg' => 'required',
		'observaciones' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['fecha_diag','nombre_enf','obs_cli','fecha_reg','observaciones'];



}
