<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'admin',
            'estudiante',
            'tutor-institucional',
            'tutor-empresarial'
        ];

        foreach ($data as $rol){
            Role::create(['name'=> $rol ]);
        }
        
    }
}
