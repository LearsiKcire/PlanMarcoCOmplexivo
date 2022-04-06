<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\Empresa;
use App\Models\Nivel;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        

        $data_empresas = [
            'Yavirac',
            'Espe',
            'Yavi Tec ',
        ];
         
        foreach ($data_empresas as $empresa){
            $geren = 'ninguno';
            Empresa::create(['nombre'=> $empresa, 'gerente'=>$geren]);
        }
       
    }
}
