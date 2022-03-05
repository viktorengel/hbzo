<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Especialidad;
use App\Models\Appointment;
use App\Models\CancelledAppointment;
use App\Models\User;
use App\Interfaces\ScheduleServiceInterface;
use App\Http\Requests\StoreAppointment;

use Carbon\Carbon;
use Validator;

class AppointmentController extends Controller
{
    

     public function index()
    {
        $role = auth()->user()->role;

        if ($role == 'admin') { 
            $pendingAppointments = Appointment::where('status', 'Reservada')
                ->paginate(15);
            $confirmedAppointments = Appointment::where('status', 'Confirmada')
                ->paginate(15);
            $oldAppointments = Appointment::whereIn('status', ['Atendida', 'Cancelada'])
                ->paginate(15);

        } elseif ($role == 'doctor') {
            $pendingAppointments = Appointment::where('status', 'Reservada')
                ->where('doctor_id', auth()->id())
                ->paginate(15);
            $confirmedAppointments = Appointment::where('status', 'Confirmada')
                ->where('doctor_id', auth()->id())
                ->paginate(15);
            $oldAppointments = Appointment::whereIn('status', ['Atendida', 'Cancelada'])
                ->where('doctor_id', auth()->id())
                ->paginate(15);

        } elseif ($role == 'patient') {
            $pendingAppointments = Appointment::where('status', 'Reservada')
                ->where('patient_id', auth()->id())
                ->paginate(15);
            $confirmedAppointments = Appointment::where('status', 'Confirmada')
                ->where('patient_id', auth()->id())
                ->paginate(15);
            $oldAppointments = Appointment::whereIn('status', ['Atendida', 'Cancelada'])
                ->where('patient_id', auth()->id())
                ->paginate(15);
        }
        

        return view('appointments.index', 
            compact(
                'pendingAppointments', 'confirmedAppointments', 'oldAppointments',
                'role'
            )
        );
    }
    
     public function create(ScheduleServiceInterface $scheduleService)
    {
    	$specialties = Especialidad::all();
        $role = auth()->user()->role;

        $specialtyId = old('especialidad_id');
        if ($specialtyId) {
            $specialty = Especialidad::find($specialtyId);
            $doctors = $specialty->users;
        } else {
            $doctors = collect();
        }
        
        $pacientes=User::Patients()->get();

        $date = old('scheduled_date');
        $doctorId = old('doctor_id');
        if ($date && $doctorId) {
            $intervals = $scheduleService->getAvailableIntervals($date, $doctorId);
        } else {
            $intervals = null;
        }

        return view('appointments.create', compact('specialties', 'doctors', 'intervals','pacientes','role'));
    }

    public function store(Request $request,ScheduleServiceInterface $scheduleService)
    {   
        $role = auth()->user()->role;

        
        if ($role=='admin') {
           $rules=[
            'description'=>'required',
            'especialidad_id'=>'exists:especialidads,id',
            'doctor_id'=>'exists:users,id',
            'paciente_id'=>'exists:users,id',
            'scheduled_time'=>'required',
        ];
        }else{
            $rules=[
            'description'=>'required',
            'especialidad_id'=>'exists:especialidads,id',
            'doctor_id'=>'exists:users,id',
            'scheduled_time'=>'required',
        ];
        }

        $messages = ['scheduled_time.required' => 'Por favor seleccione una hora válida para su cita'];

        $validator=Validator::make($request->all(), $rules,$messages);
        
        $validator->after(function ($validator) use ($request,$scheduleService){
            $date=$request->input('scheduled_date');
            $doctorId=$request->input('doctor_id');
            $scheduled_time=$request->input('scheduled_time');
            if ($date && $doctorId &&  $scheduled_time) {
               $start=new Carbon($scheduled_time);
            }else{
                return;
            }
            
            if (!$scheduleService->isAvailableInterval($date, $doctorId, $start)) {
                $validator->errors()->add('available_time', 'La hora seleccionada ya se encuentra reservada por otro paciente.');
            }
        });

           if ($validator->fails()) {
              return back()
                       ->withErrors($validator)
                       ->withInput();
           }


    	 $data = $request->only([
            'description', 
            'especialidad_id',
            'doctor_id',
            'scheduled_date',
            'scheduled_time',
            'type'
        ]);


        
        if ($role=='admin') {
           $data['patient_id'] = $request->input('paciente_id');
        }else{
           $data['patient_id'] = auth()->id(); 
        }
        
         

        // right time format
        $carbonTime = Carbon::createFromFormat('g:i A', $data['scheduled_time']);
        $data['scheduled_time'] = $carbonTime->format('H:i:s');
        Appointment::create($data);
         $notification='La cita se ha registrado Correctamente';
    	 return redirect('/appointments')->with(compact('notification'));
    }

  

   public function showCancelForm(Appointment $appointment)
    {
        if ($appointment->status == 'Confirmada') {
            $role = auth()->user()->role;
            return view('appointments.cancel', compact('appointment', 'role'));
        }

        return redirect('/appointments');
    }

    public function postCancel(Appointment $appointment, Request $request)
    {
        if ($request->has('justification')) {
            $cancellation = new CancelledAppointment();
            $cancellation->justification = $request->input('justification');
            $cancellation->cancelled_by_id = auth()->id();
            // $cancellation->appointment_id = ;
            // $cancellation->save();

            $appointment->cancellation()->save($cancellation);
        }
        
        $appointment->status = 'Cancelada';
        $saved = $appointment->save(); // update

        if ($saved)
            $appointment->patient->sendFCM('Su cita ha sido cancelada.');

        $notification = 'La cita se ha cancelado correctamente.';
        return redirect('/appointments')->with(compact('notification'));
    }

    public function postConfirm(Appointment $appointment)
    {
        $appointment->status = 'Confirmada';
        $saved = $appointment->save(); // update

        if ($saved)        
            $appointment->patient->sendFCM('Su cita se ha confirmado!');

        $notification = 'La cita se ha confirmado correctamente.';
        return redirect('/appointments')->with(compact('notification'));
    }


    public function show(Appointment $appointment)
    {
        $role = auth()->user()->role;
        return view('appointments.show', compact('appointment', 'role'));
    }






}
