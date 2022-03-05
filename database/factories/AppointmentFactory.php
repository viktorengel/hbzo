<?php

namespace Database\Factories;

use App\Models\Appointment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class AppointmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Appointment::class;
   

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
    $doctorIds = User::doctors()->pluck('id');
    $patientIds = User::patients()->pluck('id');

    $date = $this->faker->dateTimeBetween('-1 years', 'now');
    $scheduled_date = $date->format('Y-m-d');
    $scheduled_time = $date->format('H:i:s');

    $types = ['Consulta', 'Examen', 'Operación'];
    $statuses = ['Atendida', 'Cancelada']; // 'Reservada', 'Confirmada'

    return [
        'description' => $this->faker->sentence(5),
        'especialidad_id' => $this->faker->numberBetween(1, 3),
        'doctor_id' => $this->faker->randomElement($doctorIds),
        'patient_id' => $this->faker->randomElement($patientIds),
        'scheduled_date' => $scheduled_date,
        'scheduled_time' => $scheduled_time,
        'type' => $this->faker->randomElement($types),
        'status' => $this->faker->randomElement($statuses)
    ];
    }
}
