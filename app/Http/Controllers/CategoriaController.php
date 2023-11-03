<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Http\Requests\StoreCategoriaRequest;
use App\Http\Requests\UpdateCategoriaRequest;

class CategoriaController extends Controller
{
    public function index()
    {
        $categoria = Categoria::all();
        return view('Categoria/indexCategoria', ['categorias'=>$categoria]);
    }

    public function create()
    {
        return view('Categoria/createCategoria');
    }

    public function store(StoreCategoriaRequest $request)
    {
        $request->validate([
            'tipo' => ['required', 'min:2', 'max:100'],
            'descripcion' => ['min:2', 'max:500']
        ]); 
        Categoria::create($request->all());
        return redirect()->route('categoria.index');
    }

    public function show(Categoria $categoria)
    {
        return view('Categoria/showCategoria', compact('categoria'));
    }

    public function edit(Categoria $categoria)
    {
        return view('Categoria/editCategoria', compact('categoria')); 
    }

    public function update(UpdateCategoriaRequest $request, Categoria $categoria)
    {
        $validated = $request->validate([
            'tipo' => ['required', 'min:2', 'max:100'],
            'descripcion' => ['min:2', 'max:500']
        ]); 

        Categoria::where('id', $categoria->id)->update($request->except('_token', '_method'));
        return redirect()->route('categoria.index'); 
    }

    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        return redirect()->route('categoria.index');
    }
}
