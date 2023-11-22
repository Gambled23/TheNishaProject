<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pedidos extends Model
{
    protected $fillable = ['user_id', 'puntoEntrega', 'precioTotal'];
    use HasFactory;
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
