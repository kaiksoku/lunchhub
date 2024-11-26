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
        $roleanalista = Role::create(['name' => 'Analista']);
        $rolesupervisor = Role::create(['name' => 'Supervisor']);
        $rolesolicitante = Role::create(['name' => 'Solicitante']);

        Permission::create(['name' => 'Ver Dashboard'])->syncRoles([$roleadmin]);

        Permission::create(['name' => 'Ver Solicitudes'])->syncRoles([$roleadmin]);
        Permission::create(['name' => 'Crear Solicitudes'])->assignRole([$roleadmin]);
        Permission::create(['name' => 'Editar Solicitudes'])->assignRole([$roleadmin]);
        Permission::create(['name' => 'Eliminar Solicitudes'])->assignRole([$roleadmin]);

        Permission::create(['name' => 'Ver Restaurante'])->syncRoles([$roleadmin]);
        Permission::create(['name' => 'Crear Restaurante'])->assignRole([$roleadmin]);
        Permission::create(['name' => 'Editar Restaurante'])->assignRole([$roleadmin]);
        Permission::create(['name' => 'Eliminar Restaurante'])->assignRole([$roleadmin]);

        Permission::create(['name' => 'Ver Autorizaciones'])->syncRoles([$roleadmin]);
        Permission::create(['name' => 'Crear Autorizaciones'])->assignRole([$roleadmin]);
        Permission::create(['name' => 'Editar Autorizaciones'])->assignRole([$roleadmin]);
        Permission::create(['name' => 'Eliminar Autorizaciones'])->assignRole([$roleadmin]);

        Permission::create(['name' => 'Ver Empleado'])->assignRole([$roleadmin]);
        Permission::create(['name' => 'Crear Empleado'])->assignRole([$roleadmin]);
        Permission::create(['name' => 'Editar Empleado'])->assignRole([$roleadmin]);
        Permission::create(['name' => 'Eliminar Empleado'])->assignRole([$roleadmin]);

        Permission::create(['name' => 'Ver Departamento'])->assignRole([$roleadmin]);
        Permission::create(['name' => 'Crear Departamento'])->assignRole([$roleadmin]);
        Permission::create(['name' => 'Editar Departamento'])->assignRole([$roleadmin]);
        Permission::create(['name' => 'Eliminar Departamento'])->assignRole([$roleadmin]);

        Permission::create(['name' => 'Ver Usuario'])->assignRole([$roleadmin]);
        Permission::create(['name' => 'Crear Usuario'])->assignRole([$roleadmin]);
        Permission::create(['name' => 'Editar Usuario'])->assignRole([$roleadmin]);
        Permission::create(['name' => 'Eliminar Usuario'])->assignRole([$roleadmin]);

        Permission::create(['name' => 'Ver Roles'])->assignRole([$roleadmin]);
        Permission::create(['name' => 'Crear Roles'])->assignRole([$roleadmin]);
        Permission::create(['name' => 'Editar Roles'])->assignRole([$roleadmin]);
        Permission::create(['name' => 'Eliminar Roles'])->assignRole([$roleadmin]);
    }
}
