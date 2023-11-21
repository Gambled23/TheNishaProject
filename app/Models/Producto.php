<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'descripcion', 'precio', 'disponibles', 'imagenesTotales'];
    public $timestamps = false;

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'producto_tag');
    }

    public function variacions()
    {
        return $this->belongsToMany(Variacion::class)
            ->withPivot('tiempo_total');
    }
}
