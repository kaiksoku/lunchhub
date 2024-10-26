<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto; // Importa el modelo Producto
use App\Models\Categoria; // Importa el modelo Producto
use App\Http\Requests\ValidacionProducto;


class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show()
    {
        // Trae los productos ordenados por su id
        $productos = Producto::orderby('prod_id')->get(); 
        return view('producto.productoview', compact('productos'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::all(); 
        return view('producto.productocreate', compact('categorias'));
    }
    

    /**
     * Store a newly created resource in storage.
     */
    

    /**
     * Show the form for editing the specified resource.
     * 
     * 
     */

     public function store(ValidacionProducto $request)
    {
        
        $data = $request->validated();
        Producto::create($data);
        return redirect()->route('producto')->with('mensaje', 'Producto Registrado con Éxito.');
    }
     
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
