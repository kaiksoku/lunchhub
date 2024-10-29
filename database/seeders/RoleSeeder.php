<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $roleadmin = Role::create(['name' => 'Admin']);
        $rolecajero = Role::create(['name' => 'Cajero']);

        Permission::create(['name' => 'producto']);
        Permission::create(['name' => 'producto.create']);
        Permission::create(['name' => 'producto.editar']);
        Permission::create(['name' => 'producto.eliminar']);
    }
}
