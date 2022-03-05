<?php

namespace App\Models;
 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CancelledAppointment extends Model
{
    use HasFactory;

     public function cancelled_by() // cancelled_by_id
    {	// belongsTo Cancellation N - 1 User hasMany
    	return $this->belongsTo(User::class);
    }
    
}
