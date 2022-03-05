<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Especialidad;
class SpecialtyController extends Controller
{
    public function doctors(Especialidad $Especialidad){
    	//return $Especialidad->users; MOSTRAR TODOS LOS USARIOS DE ESA ESPECIALIDAD
    	return $Especialidad->users()->get(['users.id','users.name']);
    }
}

