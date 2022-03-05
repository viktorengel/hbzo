<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password','phone','address','cedula','role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'pivot',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    // $user->specialties
    public function specialties()
    {
        return $this->belongsToMany(Especialidad::class,'specialty_user')->withTimestamps();
    }

    public function scopePatients($query){
        return $query->where('role','patient');
    }
    public function scopeDoctors($query){
        return $query->where('role','doctor');
    }   

    public function scopeAdministradors($query){
        return $query->where('role','admin');
    }

    // $user->asPatientAppointments  ->requestedAppointments
    // $user->asDoctorAppointments   ->attendedAppointments
    public function asDoctorAppointments()
    {
        return $this->hasMany(Appointment::class, 'doctor_id');
    }

    public function attendedAppointments()
    {
        return $this->asDoctorAppointments()->where('status', 'Atendida');
    }

    public function cancelledAppointments()
    {
        return $this->asDoctorAppointments()->where('status', 'Cancelada');
    }
    
    public function asPatientAppointments()
    {
        return $this->hasMany(Appointment::class, 'patient_id');
    }
    
      public function sendFCM($message) 
    {
        if (!$this->device_token)
            return;

        return fcm()->to([
                $this->device_token
            ])->notification([
                'title' => config('app.name'),
                'body' => $message
            ])->send();
    }

}
