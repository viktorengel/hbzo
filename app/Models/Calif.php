<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Calif
 *
 * @property $id
 * @property $medico
 * @property $calificacion
 * @property $patient_id
 * @property $created_at
 * @property $updated_at
 *
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Calif extends Model
{
    
    static $rules = [
		'medico' => 'required',
		'calificacion' => 'required',
		'patient_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['medico','calificacion','patient_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'patient_id');
    }
    

}
