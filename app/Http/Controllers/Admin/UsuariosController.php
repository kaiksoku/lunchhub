<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller; // Importa el controlador base de Laravel
use Illuminate\Http\Request;
use App\Models\User; // Importa el modelo Producto

class UsuariosController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(Request $request)
    {
        $search = $request->input('search');

        $usuarios = User::when($search, function ($query, $search) {
                return $query->where('name', 'like', '%' . $search . '%')
                            ->orWhere('email', 'like', '%' . $search . '%');
            })
            ->with('roles')
            ->orderBy('id')
            ->paginate(10);

        return view('admin.users.usuariosview', compact('usuarios', 'search'));
    }

}



