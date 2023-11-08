<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    protected $fillable = ['tipo', 'descripcion'];
    public $timestamps = false;

    public function productos()
    {
        return $this->belongsToMany(Productos::class);
    }
}
