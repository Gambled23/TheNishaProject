<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Producto;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tag::factory()->count(5)->create();

        $productos = Producto::all();

        // Relleno de tabla pivote
        Tag::all()->each(function ($tag) use ($productos) { 
            $tag->productos()->attach(
            $productos->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
    }
}
