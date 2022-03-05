<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Especialidad;
use App\Models\User;


class SpecialtiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $specialties = [
    		'Oftalmología',
    		'Pediatría',
    		'Neurología'
    	];


    	foreach ($specialties as $specialtyName) {
    		$specialty=Especialidad::create([
	        	'name' => $specialtyName,
	        	'description' => 'Una descripción',
	        	'estado' => 1
	        ]);

            $specialty->users()->saveMany(
            	User::factory(3)->sdoctor()->make()
            	//$users = User::factory()->count(5)->suspended()->make();
            );
    	}
 
        // Médico Test
       User::find(3)->specialties()->save($specialty);    
    }
}
