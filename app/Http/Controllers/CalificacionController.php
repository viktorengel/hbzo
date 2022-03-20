<?php

namespace App\Http\Controllers;

use App\Models\Appointment;

use Illuminate\Http\Request;

class CalificacionController extends Controller
{
    public function index(Appointment $appointment)
    {
        $role = auth()->user()->role;
        return view('appointments.calificacion', compact('appointment', 'role'));
    }

    public function postCalificar(Appointment $appointment, Request $request)
    {
        
        $appointment->calificacion = $request->input('calificacion');
        $saved = $appointment->save(); // update

        $notification = 'La cita ha calificada correctamente.';
        return redirect('/appointments')->with(compact('notification'));
    }
}
