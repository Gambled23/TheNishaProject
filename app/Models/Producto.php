<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function nombre(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => ucwords($value),
            set: fn (string $value) => ucwords($value),
        );
    }

}
