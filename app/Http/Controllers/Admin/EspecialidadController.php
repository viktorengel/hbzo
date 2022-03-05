<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Especialidad;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class EspecialidadController extends Controller
{
   
   public function __construct(){
   		$this->middleware('auth');
   }

   public function index(){
   		$especialidades=Especialidad::paginate(10);
/*compact('especialidades')*/

   		return view('especialidades.index',['especialidades' => $especialidades]);
   }

   public function store(Request $Request){
   		/*dd($Request->all()); pra ver que datos nos envia el form*/ 
   		
   		$roles=[
            'name' => 'required|min:5'
        ];
   		$mensajes=[
            'name.required' => 'El campo nombre es obligatorio ingresar',
            'name.min' => 'El campo nombre debe tener como minimo 5 caracteres',
        ];

   		$validator = Validator::make($Request->all(),$roles,$mensajes );

   		if ($validator->passes()) {
   			if ($Request->input('id')!=0) {
   				$especialidad = Especialidad::find($Request->input('id'));
          $especialidad->name=$Request->input('name');
          $especialidad->description=$Request->input('description');
          $especialidad->save();

   			}else{
          $especialidad=new Especialidad();
   				$especialidad->name=$Request->input('name');
		   		$especialidad->description=$Request->input('description');
		   		$especialidad->estado=1;
		   		$especialidad->save();	
   			}
        

        }

        return response()->json(['error'=>$validator->errors()]);
   }


   public function destroy($id){
      
      $esp = Especialidad::find($id);
        
        $esp->delete();
   }

   public function show($id){
      return Especialidad::find($id);
   }

   public function estado(Especialidad $especialidad,Request $Request){
          $especialidad->estado=$Request->input('estado');
          $especialidad->save();
          return redirect('/especialidades');
   }

}
