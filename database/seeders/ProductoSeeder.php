<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Producto;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Producto::factory()->count(5)->create();

        foreach (Producto::all() as $producto) {
            $tags = Tag::inRandomOrder()->take(rand(1, 3))->pluck('id'); //por cada producto se asignan de 1 a 3 tags :>
            $producto->tags()->attach($tags); //pa controlador vas padrino aAa
        }
    }
}
