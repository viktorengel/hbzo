<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Especialidad extends Model
{
    //use HasFactory;

  // $specialty->users
    public function users()
    {
    	return $this->belongsToMany(User::class,'specialty_user')->withTimestamps();
    }
}
