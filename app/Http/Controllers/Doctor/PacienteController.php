<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Appointment;
use App\Models\User;

class PacienteController extends Controller
{
   public function index(){


   	 $paciente=Appointment::join('users','patient_id', '=', 'users.id')->select('users.id','users.name','users.email','users.cedula','users.phone')->where('doctor_id','=',auth()->user()->id)->groupBy('id')->groupBy('name')->groupBy('email')->groupBy('cedula')->groupBy('phone')->paginate(10);
     return view('doctor.paciente',compact('paciente'));
   }



}
