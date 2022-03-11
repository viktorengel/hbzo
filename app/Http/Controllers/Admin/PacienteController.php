<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;

class PacienteController extends Controller
{
    
    /** INDEX */
    public function index()
    { 
        $paciente=User::Patients()->paginate(3);
     return view('paciente.index',compact('paciente'));
    }
 
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('paciente.create');
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
        
        User::create(
            $request->only('name','email','phone','address','cedula') +
            [
                'role'=>'patient',
                'password'=>bcrypt($request->input('password'))
        ] 
        );

        $notification='El paciente se ha registrado correctamente';
        return redirect('/paciente')->with(compact('notification'));
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
               
     $paciente=User::Patients()->findOrFail($id);
     return view('paciente.edit',compact('paciente'));

    }

    /**
     Actualizar
     */
    public function update(Request $request, $id)
    {
       $roles=[
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|email',
            'cedula' => 'digits:8'];
        $mensajes=[
            'name.required' => 'El campo nombre es obligatorio ingresar',
            'name.max' => 'El campo nombre debe tener como maximo 255 caracteres',
            'email.riquired' => 'El campo email es requerido',
            'cedula.digits' => 'El campo CédulaC debe tener 10 digitos',
        ];

        $validatedData = $request->validate($roles, $mensajes);
          
        $user=User::Patients()->findOrFail($id);  
        $data=$request->only('name','email','phone','address','cedula');
        
        $password=$request->input('password');
            if ($password!=null){ 
                $data['password']=bcrypt($password);
            }
        $user->fill($data);
        $user->save();//UPDATE guardar cambios

        $notification='La informacion del paciente se ha actualizado correctamente';
        return redirect('/paciente')->with(compact('notification'));
    }

    /**
    Delete
     */
    public function destroy(User $paciente)
    {
        $pacienteName=$paciente->name;        
        $paciente->delete();
        $notification="El paciente $pacienteName se ha eliminado correctamente";
        return redirect('/paciente')->with(compact('notification'));

    }
}
