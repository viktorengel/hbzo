<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\WorkDay;

class WorkDaysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       for ($i=0; $i<7; ++$i) {
        	WorkDay::create([
        		'day' => $i,
		        'active' => ($i==0), // Thursday

		        'morning_start' => ($i==0 ? '09:00:00' : '09:00:00'),
		        'morning_end' => ($i==0 ? '11:30:00' : '11:30:00'),

		        'afternoon_start' => ($i==0 ? '16:00:00' : '16:00:00'),
		        'afternoon_end' => ($i==0 ? '18:00:00' : '18:00:00'),

		        'user_id' => 3 // Médico Test (UsersTableSeeder)
        	]);
        }

    }
}
