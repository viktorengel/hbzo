<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AdministradorController extends Controller
{
    /** INDEX */
    public function index()
    { 
        $administrador=User::Administradors()->paginate(10);
     return view('administrador.index',compact('administrador'));
    }
 
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administrador.create');
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

        $validatedData = $request->validate($roles);
        
        User::create(
            $request->only('name','email','phone','address','cedula') +
            [
                'role'=>'admin',
                'password'=>bcrypt($request->input('password'))
        ] 
        );

        $notification='El Administrador se ha registrado correctamente';
        return redirect('/administrador')->with(compact('notification'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     mostrar oara editar
     */
    public function edit($id)
    {
               
     $administrador=User::Administradors()->findOrFail($id);
     return view('administrador.edit',compact('administrador'));

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

        $validatedData = $request->validate($roles);
          
        $user=User::Administradors()->findOrFail($id);  
        $data=$request->only('name','email','phone','address','cedula');
        
        $password=$request->input('password');
            if ($password!=null){ 
                $data['password']=bcrypt($password);
            }
        $user->fill($data);
        $user->save();//UPDATE guardar cambios

        $notification='La informacion del Administrador se ha actualizado correctamente';
        return redirect('/administrador')->with(compact('notification'));
    }

    /**
    Delete
     */
    public function destroy(User $administrador)
    {
        $administradorName=$administrador->name;        
        $administrador->delete();
        $notification="El administrador $administradorName se ha eliminado correctamente";
        return redirect('/administrador')->with(compact('notification'));

    }
}
