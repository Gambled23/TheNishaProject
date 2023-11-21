<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class productoCategoriaController extends Controller
{
    public function showByCategory($tag_id)
    {
        $tag = Tag::find($tag_id);
        
        $categorias = Tag::all();
        $productos = $tag->productos()->wherePivot('tag_id', $tag_id)->get();
        return view('tienda', compact('productos', 'categorias'), ['tag' => $tag->nombre]);
    }
}
