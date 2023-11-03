<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'descripcion', 'precio', 'disponibles'];
    public $timestamps = false;

    public function categorias()
    {
        return $this->belongsToMany(Categoria::class);
    }
}
