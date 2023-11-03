<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $producto = Producto::all();
        //$producto = Producto::with('tags')->orderBy(column:'id')->get();
        return view('Producto/indexProducto', ['productos'=>$producto]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Producto/createProducto');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => ['required', 'min:2', 'max:100'],
            'descricpion' => ['required', 'min:5', 'max:500'],
            'precio' => ['required|numeric'],
            'disponibles' => ['required|numeric']
        ]);

        Producto::create($request->all());
        return redirect()->route('producto.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {
        return view('Producto/showProducto', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producto $producto)
    {
        return view('Producto/editProducto', compact('producto')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto)
    {
        $validated = $request->validate([
            'nombre' => ['required', 'min:2', 'max:100'],
            'descricpion' => ['required', 'min:5', 'max:500'],
            'precio' => ['required|numeric'],
            'disponibles' => ['required|numeric']
        ]);

        Producto::where('id', $producto->id)->update($request->except('_token', '_method'));
        return redirect()->route('producto.index'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('producto.index');
    }
}
