<?php

namespace App\Http\Controllers;

use App\Models\Variacion;
use Illuminate\Http\Request;

class VariacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $variacions = Variacion::all();

        return view('Variacion.indexVariacion', compact('variacions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $variacions = Variacion::all();
        return view('Variacion.createVariacion', compact('variacions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => ['required', 'min:2', 'max:30']
        ]);

        $variacion = Variacion::create($request->all());

        session()->flash('success', 'La Variación se creó con éxito');
        return redirect()->route('admin.variacion.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Variacion $variacion)
    {
        return view('Variacion.showVariacion', compact('variacion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Variacion $variacion)
    {
        return view('Variacion.editVariacion', compact('variacion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Variacion $variacion)
    {
        $validated = $request->validate([
            'nombre' => ['required', 'min:2', 'max:30']
        ]);

        Variacion::where('id', $variacion->id)->update($request->except('_token', '_method'));

        session()->flash('success', 'La variacion se actualizó con éxito');
        return redirect()->route('admin.variacion.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Variacion $variacion)
    {
        $variacion->delete();
        session()->flash('success', 'La variación se eliminó con exito');
        return redirect()->route('admin.variacion.index');
    }
}
