<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'permission-list',
            'permission-create',
            'permission-edit',
            'permission-delete',
            
            'post-list',
            'post-create',
            'post-edit',
            'post-delete',

            'empresa-list',
            'empresa-create',
            'empresa-edit',
            'empresa-delete',

            'nivel-list',
            'nivel-create',
            'nivel-edit',
            'nivel-delete',

            'nivelconocimiento-list',
            'nivelconocimiento-create',
            'nivelconocimiento-edit',
            'nivelconocimiento-delete',

            'tipodocumento-list',
            'tipodocumento-create',
            'tipodocumento-edit',
            'tipodocumento-delete',

            'documento-list',
            'documento-create',
            'documento-edit',
            'documento-delete',

            'objetivo-list',
            'objetivo-create',
            'objetivo-edit',
            'objetivo-delete',

            'detalle-list',
            'detalle-create',
            'detalle-edit',
            'detalle-delete',

            'footer-list',
            'footer-create',
            'footer-edit',
            'footer-delete',

            'pdf-list',
            'pdf-create',
            'pdf-edit',
            'pdf-delete',

        ];

        foreach ($data as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}
