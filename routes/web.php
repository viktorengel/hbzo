<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return  redirect('home');

});


//LIMPIAR CACHE DEL PROYECTO
Route::get('/clear-cache', function () {
   echo Artisan::call('config:clear');
   echo Artisan::call('config:cache');
   echo Artisan::call('cache:clear');
   echo Artisan::call('route:clear');
});
//

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//PERFIL PACIENTE
Route::get('/perfil/paciente',[App\Http\Controllers\HomeController::class,'editpaciente']);
Route::put('/perfil/{id}/paciente',[App\Http\Controllers\HomeController::class,'updatepaciente']);

//PERFIL DOCTOR
Route::get('/perfil/doctor',[App\Http\Controllers\HomeController::class,'editdoctor']);
Route::put('/perfil/{id}/doctor',[App\Http\Controllers\HomeController::class,'updatedoctor']);


Route::middleware(['auth','admin'])->group(function(){	
		/*ESPECIALIDAD*/
		Route::get('/especialidades',[App\Http\Controllers\Admin\EspecialidadController::class,'index']);
		Route::get('/especialidades/{id}/show',[App\Http\Controllers\Admin\EspecialidadController::class,'show']);
		//create update
		Route::post('/especialidades', [App\Http\Controllers\Admin\EspecialidadController::class,'store']); 
		// estado
		Route::put('/especialidades/{especialidad}', [App\Http\Controllers\Admin\EspecialidadController::class,'estado']); 
		//delete
		Route::delete('/especialidades/{especialidad}', [App\Http\Controllers\Admin\EspecialidadController::class,'destroy']); 
		
		/*DOCTOR*/
		Route::resource('doctor',App\Http\Controllers\Admin\DoctorController::class); 
		
		/*PACIENTES*/
		Route::resource('paciente',App\Http\Controllers\Admin\PacienteController::class); 
        
		/*ADMIN*/
		Route::resource('administrador',App\Http\Controllers\Admin\AdministradorController::class); 

		Route::get('/charts/appointments/line', [App\Http\Controllers\Admin\ChartController::class,'appointments']);
		Route::get('/charts/doctors/column', [App\Http\Controllers\Admin\ChartController::class,'doctors']);
		Route::get('/charts/doctors/column/data', [App\Http\Controllers\Admin\ChartController::class,'doctorsJson']);
		//charts/doctors/column/data
});


Route::middleware(['auth','doctor'])->group(function(){	
		Route::get('/schedule',[App\Http\Controllers\Doctor\ScheduleController::class,'edit']);
		Route::post('/schedule',[App\Http\Controllers\Doctor\ScheduleController::class,'store']);

		Route::get('/paciente',[App\Http\Controllers\Doctor\PacienteController::class,'index']);
});

Route::middleware('auth')->group(function () {

	

	Route::get('/appointments/create', [App\Http\Controllers\AppointmentController::class,'create']);
	Route::post('/appointments', [App\Http\Controllers\AppointmentController::class,'store']);
	Route::get('/appointments', [App\Http\Controllers\AppointmentController::class,'index']);

	Route::get('/appointments/{appointment}', [App\Http\Controllers\AppointmentController::class,'show']);
 
	Route::get('/appointments/{appointment}/cancel', [App\Http\Controllers\AppointmentController::class,'showCancelForm']);
	Route::post('/appointments/{appointment}/cancel', [App\Http\Controllers\AppointmentController::class,'postCancel']);
	Route::post('/appointments/{appointment}/confirm', [App\Http\Controllers\AppointmentController::class,'postConfirm']);

	//json http://127.0.0.1:8000/api/specialties/1/doctors 
	Route::get('/specialties/{especialidad}/doctors', [App\Http\Controllers\Api\SpecialtyController::class,'doctors']);
	Route::get('/schedule/hours', [App\Http\Controllers\Api\ScheduleController::class,'hours']);

	

});
	

 