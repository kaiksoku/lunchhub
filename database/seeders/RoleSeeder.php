<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permmision\Models\Role;
use Spatie\Permmision\Models\Permmision;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role0 = Role::create(['name' -> 'admin']);
        $role1 = Role::create(['name' -> 'cajero']);

        Permission:create(['name' -> 'ver']);
        Permission:create(['name' -> 'crear']);
        Permission:create(['name' -> 'editar']);
        Permission:create(['name' -> 'eliminar']);

    }
}
