<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = User::create(
            [
                'name_f' => 'admin',
                'name_s' => ' ',
                'apellido_f' => ' ',
                'apellido_s' => ' ',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin@1234'),
                'cedula' => '1723647994',
                'nivel_id' => '7',
                'empresa_id' => '1',
            ],
           
        );

        $role = Role::find(1);

        $permissions = Permission::pluck('id', 'id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);
    }
}
