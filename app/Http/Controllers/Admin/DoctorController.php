<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\models\User;
use App\models\Especialidad;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class DoctorController extends Controller
{

  
    /** INDEX */
    public function index()
    { 
        //$doctor=User::all();
        $doctor=User::Doctors()->paginate(10);
     return view('doctor.index',compact('doctor'));
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $specialties = Especialidad::all();
        return view('doctor.create', compact('specialties'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $roles=[
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|email|unique:users',
            'cedula' => 'digits:10'


        ];
        $mensajes=[
            'name.required' => 'El campo nombre es obligatorio ingresar',
            'name.max' => 'El campo nombre debe tener como maximo 255 caracteres',
            'email.riquired' => 'El campo email es requerido',
            'cedula.digits' => 'El campo CédulaC debe tener 10 digitos',
        ];

        $validatedData = $request->validate($roles, $mensajes);

      
        $user=User::create(
            $request->only('name','email','phone','address','cedula') +
            [
                'role'=>'doctor',
                'password'=>bcrypt($request->input('password'))
        ]);


        $user->specialties()->attach($request->input('specialties'));

        $notification='El medico se ha registrado correctamente';
        return redirect('/doctor')->with(compact('notification'));
        //return back()->with('notification', 'El medico se ha registrado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     mostrar oara editar
     */
    public function edit($id)
    {
        $doctor=User::doctors()->findOrFail($id);
        $specialties = Especialidad::all();
        $specialty_ids = $doctor->specialties()->pluck('especialidad_id');
     return view('doctor.edit',compact('doctor','specialties','specialty_ids'));
    }

    /**
     Actualizar
     */
    public function update(Request $request, $id)
    {
          $roles=[
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|email',
            'cedula' => 'digits:10'];
        $mensajes=[
            'name.required' => 'El campo nombre es obligatorio ingresar',
            'name.max' => 'El campo nombre debe tener como maximo 255 caracteres',
            'email.riquired' => 'El campo email es requerido',
            'cedula.digits' => 'El campo CédulaC debe tener 10 digitos',
        ];

        $validatedData = $request->validate($roles, $mensajes);
          
        $user=User::doctors()->findOrFail($id);  
        $data=$request->only('name','email','phone','address','cedula');
        
        $password=$request->input('password');
            if ($password!=null){ 
                $data['password']=bcrypt($password);
            }
        $user->fill($data);
        $user->save();//UPDATE guardar cambios

        $user->specialties()->sync($request->input('specialties'));
        
        $notification='La informacion del medico se ha actualizado correctamente';
        return redirect('/doctor')->with(compact('notification'));
        //return back()->with('notification', 'El medico se ha registrado correctamente');
    }

    /**
    Delete
     */
    public function destroy(User $doctor)
    {   
        //$user=User::doctors()->findOrFail($id);
        $doctorName=$doctor->name;        
        $doctor->delete();
        $notification="El medico $doctorName se ha eliminado correctamente";
        return redirect('/doctor')->with(compact('notification'));

    }
}
