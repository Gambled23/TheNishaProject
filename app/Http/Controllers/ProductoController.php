<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Producto;
use App\Models\Variacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UpdateProductoRequest;
use Image;

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
            'tags' => ['array'],
            'image.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $data = $request->all();

        if($request->hasfile('image'))
        {
            $images = $request->file('image');
            $data['imagenesTotales'] = count($images);
            foreach($images as $key => $image)
            {
                $name = ucwords($request->nombre) . '_' . $key . '.' . 'jpg';

                // Resize image instance
                $img = Image::make($image);
                $width = $img->width();
                $height = $img->height();

                // calculate smaller size
                $size = min([$width, $height]);

                // crop image
                $img->crop($size, $size);

                // save image
                $img->save(public_path().'/images/' . $name);

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

    public function editImages(Producto $producto)
    {
        return view('Producto/editImages', compact('producto'));
    }

    public function deleteImages(Request $request, Producto $producto)
    {
        $request->validate([
            'images' => 'required|array',
            'images.*' => 'required|integer',
        ]);

        $images = $request->input('images', []);
        if(count($images) > $producto->imagenesTotales)
        {
            session()->flash('error', 'No se puede eliminar mas imagenes de las que hay');
            return back();
        }
        if($producto->imagenesTotales - count($images) <= 0)
        {
            session()->flash('error', 'No se puede dejar un producto sin imagenes');
            return back();
        }
        foreach($images as $image)
        {
            $name = ucwords($producto->nombre) . '_' . $image . '.' . 'jpg';
            unlink(public_path().'/images/' . $name);
            $producto->imagenesTotales--;
            $producto->save();
        }
        $files = glob(public_path('images/' . ucwords($producto->nombre) . '_*.' . 'jpg'));

        sort($files, SORT_NATURAL); // Sort files in natural order

        for ($i = 0; $i < count($files); $i++) {
            $newName = ucwords($producto->nombre) . '_' . $i . '.' . 'jpg';
            rename($files[$i], public_path('images/' . $newName));
        }
        session()->flash('success', 'Las imagenes se eliminaron con exito');
        return back();
    }

    public function uploadImages(Request $request, Producto $producto)
    {
        $request->validate([
            'images' => 'required|array',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $images = $request->file('images');

        $lastImage = $producto->imagenesTotales;
        foreach($images as $key => $image)
        {
            $name = ucwords($producto->nombre) . '_' . ($key + $lastImage) . '.' . 'jpg';

            // Create an image instance and crop it to a square
            $img = Image::make($image);
            $width = $img->width();
            $height = $img->height();
            $size = min([$width, $height]);
            $img->crop($size, $size);

            // Save the cropped image
            $img->save(public_path().'/images/' . $name);

            $producto->imagenesTotales++;
            $producto->save();
        }

        session()->flash('success', 'Las imagenes se subieron con exito');
        return back();
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

    public function destroy(Producto $producto)
    {
        // Borrar imagenes
        for ($i = 0; $i < $producto->imagenesTotales; $i++) {
            $name = $producto->nombre . '_' . $i . '.' . 'jpg';
            if (file_exists(public_path().'/images/' . $name)) {
                unlink(public_path().'/images/' . $name);
            }
        }

        $producto->delete();
        session()->flash('success', 'El producto se elimino con exito');
        return redirect()->route('admin.producto.index');
    }
}
