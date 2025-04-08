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
        $roleempleado = Role::create(['name' => 'Empleado']);

        Permission::create(['name' => 'Ver Dashboard'])->syncRoles([$roleadmin]);

        Permission::create(['name' => 'Ver Solicitudes'])->syncRoles([$roleadmin]);
        Permission::create(['name' => 'Crear Solicitudes'])->assignRole([$roleadmin]);
        Permission::create(['name' => 'Editar Solicitudes'])->assignRole([$roleadmin]);
        Permission::create(['name' => 'Eliminar Solicitudes'])->assignRole([$roleadmin]);

        Permission::create(['name' => 'Ver Restaurantes'])->syncRoles([$roleadmin]);
        Permission::create(['name' => 'Crear Restaurantes'])->assignRole([$roleadmin]);
        Permission::create(['name' => 'Editar Restaurantes'])->assignRole([$roleadmin]);
        Permission::create(['name' => 'Eliminar Restaurantes'])->assignRole([$roleadmin]);

        Permission::create(['name' => 'Ver Autorizaciones'])->syncRoles([$roleadmin]);
        Permission::create(['name' => 'Crear Autorizaciones'])->assignRole([$roleadmin]);
        Permission::create(['name' => 'Editar Autorizaciones'])->assignRole([$roleadmin]);
        Permission::create(['name' => 'Eliminar Autorizaciones'])->assignRole([$roleadmin]);

        Permission::create(['name' => 'Ver Empleados'])->assignRole([$roleadmin]);
        Permission::create(['name' => 'Crear Empleados'])->assignRole([$roleadmin]);
        Permission::create(['name' => 'Editar Empleados'])->assignRole([$roleadmin]);
        Permission::create(['name' => 'Eliminar Empleados'])->assignRole([$roleadmin]);

        Permission::create(['name' => 'Ver Departamentos'])->assignRole([$roleadmin]);
        Permission::create(['name' => 'Crear Departamentos'])->assignRole([$roleadmin]);
        Permission::create(['name' => 'Editar Departamentos'])->assignRole([$roleadmin]);
        Permission::create(['name' => 'Eliminar Departamentos'])->assignRole([$roleadmin]);

        Permission::create(['name' => 'Ver Usuarios'])->assignRole([$roleadmin]);
        Permission::create(['name' => 'Crear Usuarios'])->assignRole([$roleadmin]);
        Permission::create(['name' => 'Editar Usuarios'])->assignRole([$roleadmin]);
        Permission::create(['name' => 'Eliminar Usuarios'])->assignRole([$roleadmin]);

        Permission::create(['name' => 'Ver Roles'])->assignRole([$roleadmin]);
        Permission::create(['name' => 'Crear Roles'])->assignRole([$roleadmin]);
        Permission::create(['name' => 'Editar Roles'])->assignRole([$roleadmin]);
        Permission::create(['name' => 'Eliminar Roles'])->assignRole([$roleadmin]);
    }
}
