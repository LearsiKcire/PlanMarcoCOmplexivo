<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Database\Seeder;

class usuariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        
        $users=[
                [
                'name_f' => 'Erick',
                'name_s' => 'Israel',
                'apellido_f' => 'Viracocha',
                'apellido_s' => 'Vega',
                'email' => 'eivv@gmail.com',
                'password' => Hash::make('eivv@1234'),
                'cedula' => '1723647994',
                'nivel_id' => '5',
                'empresa_id' => '1',
            ],
            [
                'name_f' => 'Carlos',
                'name_s' => 'Javier',
                'apellido_f' => 'Ruiz',
                'apellido_s' => 'Diaz',
                'email' => 'cjrd@gmail.com',
                'password' => Hash::make('cjrd@1234'),
                'cedula' => '1723647923',
                'nivel_id' => '2',
                'empresa_id' => '1',
            ],
            [
                'name_f' => 'Fanny',
                'name_s' => ' ',
                'apellido_f' => 'Sanchez',
                'apellido_s' => ' ',
                'email' => 'fs@gmail.com',
                'password' => Hash::make('fs@1234'),
                'cedula' => '1723647913',
                'nivel_id' => '7',
                'empresa_id' => '1',
            ],
            [
                'name_f' => 'Geovanny',
                'name_s' => ' ',
                'apellido_f' => 'Pazmiño',
                'apellido_s' => ' ',
                'email' => 'gp@gmail.com',
                'password' => Hash::make('gp@1234'),
                'cedula' => '1723647953',
                'nivel_id' => '7',
                'empresa_id' => '1',
            ],
            [
                'name_f' => 'Monica',
                'name_s' => ' ',
                'apellido_f' => 'Tonato',
                'apellido_s' => ' ',
                'email' => 'mt@gmail.com',
                'password' => Hash::make('mt@1234'),
                'cedula' => '1723647924',
                'nivel_id' => '7',
                'empresa_id' => '2',
            ],
            [
                'name_f' => 'Martha',
                'name_s' => ' ',
                'apellido_f' => 'Simbaña',
                'apellido_s' => ' ',
                'email' => 'ms@gmail.com',
                'password' => Hash::make('ms@1234'),
                'cedula' => '1723347924',
                'nivel_id' => '7',
                'empresa_id' => '3',
            ],
        ];

        User::insert($users);
    }
}