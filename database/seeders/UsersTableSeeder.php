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

        User::create([
            'name' => 'Luana Racines',
            'email' => 'lracines@paciente.com',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'),
            'remember_token' => Str::random(10),
            'address' => 'Quito',
            'phone' => '0997864382',
            'cedula' => '1709613735',
            //'genero' => 'femenino',
            'role' => 'patient'
        ]);

        User::create([
            'name' => 'Emilia Rengel',
            'email' => 'erengel@paciente.com',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'),
            'remember_token' => Str::random(10),
            'address' => 'Pusuqi',
            'phone' => '0998343254',
            'cedula' => '1709613722',
            //'genero' => 'femenino',
            'role' => 'patient'
        ]);

        User::create([
            'name' => 'JuanP Rengel',
            'email' => 'jrengel@paciente.com',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'),
            'remember_token' => Str::random(10),
            'address' => 'Pusuqui',
            'phone' => '0993443254',
            'cedula' => '1709333722',
            // 'genero' => 'masculino',
            'role' => 'patient'
        ]);

        //$users = User::factory()->count(5)->suspended()->make();
        User::factory(5)->spatient()->create();
    }
}
