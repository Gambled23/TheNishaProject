<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $producto = Producto::with('tags')->get();
        //$producto = Producto::with('tags')->orderBy(column:'id')->get();
        return view('Producto/indexProducto', compact('producto'));
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
            'descripcion' => ['required', 'min:5', 'max:500'],
            'precio' => 'required|numeric',
            'disponibles' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $data = $request->all();

        if($request->hasfile('image'))
        {
            $image = $request->file('image');
            $name = $request->nombre.'.'.'jpg';
            $image->move(public_path().'/images/', $name);  
            $data['image'] = $name;  
        }

        $producto = Producto::create($data);

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
            'descripcion' => ['required', 'min:5', 'max:500'], 
            'precio' => 'required|numeric', 
            'disponibles' => 'required|numeric'
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
