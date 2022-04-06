<?php

namespace Database\Seeders;

use App\Models\Nivel;
use Illuminate\Database\Seeder;

class nivelesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $data_niveles = [
             'Primero',
             'Segundo',
             'Tercero',
             'Cuarto',
             'Quinto',
             'Sexto',
             'Ninguno',
         ];

     foreach ($data_niveles as $level){
             Nivel::create(['descripcion'=> $level]);
         }
    }
}
