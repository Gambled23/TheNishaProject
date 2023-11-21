<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Producto;
use App\Models\Variacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UpdateProductoRequest;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::with('tags', 'variacions')->get();
        //$producto = Producto::with('tags')->orderBy(column:'id')->get();
        return view('Producto/indexProducto', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $variacions = Variacion::all();
        $tags = Tag::all()->pluck('nombre', 'id');
        return view('Producto/createProducto', compact('variacions', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => ['required', 'unique:productos', 'min:2', 'max:100'],
            'descripcion' => ['required', 'min:5', 'max:500'],
            'precio' => 'required|numeric',
            'disponibles' => 'required|numeric',
            'producto.variacions.*' => ['min:5'],
            'variacions' => ['array'],
            'image.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $data = $request->all();

        if($request->hasfile('image'))
        {
            $images = $request->file('image');
            $data['imagenesTotales'] = count($images);
            foreach($images as $key => $image)
            {
                $name = $request->nombre . '_' . $key . '.' . 'jpg';
                $image->move(public_path().'/images/', $name);  
                $data['image'][$key] = $name;  
            }
        }

        $producto = Producto::create($data);

        if($request->tags)
        {
            $producto->tags()->sync($request->input('tags', []));
        }

        if($request->variacions)
        {
            $producto->variacions()->sync($this->mapVariacions($data['variacions']));
        }


        session()->flash('success', 'El producto se añadió con exito');
        return redirect()->route('admin.producto.index');
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
        $producto->load('variacions');

        $variacions = Variacion::get()->map(function($variacion) use ($producto)
        {
            $variacion->value = data_get($producto->variacions->firstWhere('id', $variacion->id), 'pivot.tiempo_total');
            return $variacion;
        });

        return view('Producto/editProducto', [
            'variacions' => $variacions,
            'producto' => $producto,
        ]); 

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'nombre' => ['required', 'min:2', 'max:100'],
            'descripcion' => ['required', 'min:5', 'max:500'],
            'precio' => 'required|numeric',
            'disponibles' => 'required|numeric',
            'producto.variacions.*' => ['required', 'min:5'],
            'variacions' => ['required', 'array'], 
        ]);
        $data = $request->all();
        $producto->update($data);
        
        $producto->variacions()->sync($this->mapVariacions($data['variacions']));

        session()->flash('success', 'El producto se modificó con exito');
        return redirect()->route('admin.producto.index'); 
    }

    private function mapVariacions($variacions)
    {
        return collect($variacions)->map(function ($i) {
            return ['tiempo_total' => $i];
        });
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();
        session()->flash('success', 'El producto se elimino con exito');
        return redirect()->route('admin.producto.index');
    }
}
