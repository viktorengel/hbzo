<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	User::create([
            'name' => 'Administrador',
            'email' => 'admin@hbzo.com',
            'email_verified_at' => now(),
            'password' => bcrypt('admin123'),
            'remember_token' => Str::random(10),
            'address' => 'Quito',
            'phone' => '',
            'cedula' => '',
            'role' => 'admin'
        ]);
        User::create([
            'name' => 'User paciente',
            'email' => 'paciente@hbzo.com',
            'email_verified_at' => now(),
            'password' => bcrypt('paciente123'),
            'remember_token' => Str::random(10),
            'address' => 'Quito',
            'phone' => '',
            'cedula' => '',
            'role' => 'patient'
        ]);

        User::create([
            'name' => 'User doctor',
            'email' => 'doctor@hbzo.com',
            'email_verified_at' => now(),
            'password' => bcrypt('doctor123'),
            //'remember_token' => Str::random(10),
            'address' => 'Quito',
            'phone' => '',
            'cedula' => '',
            'role' => 'doctor'
        ]);
        User::create([
            'name' => 'Victor Rengel',
            'email' => 'viktorengel@hotmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'),
            'remember_token' => Str::random(10),
            'address' => 'Quito',
            'phone' => '0998368685',
            'cedula' => '1709613788',
            'role' => 'admin'
        ]);


        

        //$users = User::factory()->count(5)->suspended()->make();
        User::factory(50)->spatient()->create();
    }
}
