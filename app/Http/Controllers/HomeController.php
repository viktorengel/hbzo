<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\User;
use App\Models\Especialidad;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $role = auth()->user()->role;

        $cardcitas = Appointment::whereIn('status', ['Atendida', 'Confirmada'])->get()->count();
        $cardpaciente = User::where('role', 'Patient')->get()->count();
        $carddoctor = User::where('role', 'Doctor')->get()->count();
        $cardespecialidad = Especialidad::all()->count();

        if ($role == 'admin') { 
            $confirmedAppointments = Appointment::latest()->where('status', 'Confirmada')
                ->take(5)->get();

            

        } elseif ($role == 'doctor') {
            $confirmedAppointments = Appointment::latest()->where('status', 'Confirmada')
                ->where('doctor_id', auth()->id())
                ->take(5)->get();

        

        } elseif ($role == 'patient') {
            $confirmedAppointments = Appointment::latest()->where('status', 'Confirmada')
                ->where('patient_id', auth()->id())
                ->take(5)->get();


        }
        

        return view('home', compact(
                'confirmedAppointments',
                'role',
                'cardcitas',
                'cardpaciente',
                'carddoctor',
                'cardespecialidad'
            ));
    }



    public function editpaciente()
    {
        $id=auth()->user()->id;
     $paciente=User::Patients()->findOrFail($id);
     return view('paciente.perfil',compact('paciente'));

    }


    public function updatepaciente(Request $request, $id)
    {
       $roles=[
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|email',
            'cedula' => 'digits:10'];

        $validatedData = $request->validate($roles,);
          
        $user=User::Patients()->findOrFail($id);  
        $data=$request->only('name','email','phone','address','cedula');
        
        $password=$request->input('password');
            if ($password!=null){ 
                $data['password']=bcrypt($password);
            }

        $user->fill($data);
        $user->save();//UPDATE guardar cambios

        $notification='La informacion se ha actualizado correctamente';
        return redirect('/perfil/paciente')->with(compact('notification'));
    }


     public function editdoctor()
    {   $id=auth()->user()->id;
        $doctor=User::doctors()->findOrFail($id);
        $specialties = Especialidad::all();
        $specialty_ids = $doctor->specialties()->pluck('especialidad_id');
     return view('doctor.perfil',compact('doctor','specialties','specialty_ids'));
    }

 
    public function updatedoctor(Request $request, $id)
    {
          $roles=[
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|email',
            'cedula' => 'digits:10'];

        $validatedData = $request->validate($roles);
          
        $user=User::doctors()->findOrFail($id);  
        $data=$request->only('name','email','phone','address','cedula');
        
        $password=$request->input('password');
            if ($password!=null){ 
                $data['password']=bcrypt($password);
            }
        $user->fill($data);
        $user->save();//UPDATE guardar cambios

        $user->specialties()->sync($request->input('specialties'));
        
        $notification='La informacion  se ha actualizado correctamente';
        return redirect('/perfil/doctor')->with(compact('notification'));
        //return back()->with('notification', 'El medico se ha registrado correctamente');
    }

}
