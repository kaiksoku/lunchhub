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

        Permission::create(['name' => 'producto'])->syncRoles([$roleadmin, $rolecajero ]);
        Permission::create(['name' => 'producto.create'])->assignRole([$roleadmin]);
        Permission::create(['name' => 'producto.editar'])->assignRole([$roleadmin]);
        Permission::create(['name' => 'producto.eliminar'])->assignRole([$roleadmin]);

        Permission::create(['name' => 'usuarios'])->assignRole([$roleadmin]);
        Permission::create(['name' => 'register'])->assignRole([$roleadmin]);
        Permission::create(['name' => 'register.create'])->assignRole([$roleadmin]);
    }
}
