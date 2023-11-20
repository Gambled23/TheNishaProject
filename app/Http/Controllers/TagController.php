<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Producto;

use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::all();

        return view('Tag/indexTag', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Producto::all();
        return view('Tag/createTag', compact('products'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => ['required', 'min:2', 'max:30']
        ]);

        $tag = Tag::create($request->all());

        $tag->productos()->attach($request->producto_id);

        session()->flash('success', 'El Tag se creo con exito');
        return redirect()->route('tag.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        return view('Tag/showTag', compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        return view('Tag/editTag', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tag $tag)
    {
        $validated = $request->validate([
            'nombre' => ['required', 'min:2', 'max:30']
        ]);

        Tag::where('id', $tag->id)->update($request->except('_token', '_method'));

        session()->flash('success', 'El Tag se actualizo con exito');
        return redirect()->route('tag.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        session()->flash('success', 'El tag se eliminó con exito');
        return redirect()->route('tag.index');
    }
}
