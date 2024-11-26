<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesController extends Controller
{
    public function show()
{
    $roles = Role::orderBy('id')->paginate(10); // Ordena por ID y aplica paginación de 10 elementos por página
    return view('admin.roles.rolesview', compact('roles'));
}



    public function create()
    {
        $permisos = Permission::all();
        return view('admin.roles.rolescreate', compact('permisos'));
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|unique:roles,name'
    ], [
        'name.required' => 'El nombre del rol es obligatorio.',
        'name.unique' => 'Ya existe un rol con ese nombre. Por favor, elija otro.'
    ]);
    
    try {
        $role = Role::create($request->all());

        if ($request->has('permissions')) {
            $role->permissions()->sync($request->permissions);
        }

        return redirect()->route('roles')->with('mensaje', 'El Rol se creó con éxito');
    } catch (\Exception $e) {
        return redirect()->route('roles.create')->with('mensaje de error', 'Hubo un problema al crear el rol');
    }
}

}
