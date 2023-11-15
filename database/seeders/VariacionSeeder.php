<?php

namespace Database\Seeders;

use App\Models\Producto;
use App\Models\Variacion;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VariacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Variacion::factory()->count(5)->create();

        $productos = Producto::all();

        // Relleno de tabla pivote
        Variacion::all()->each(function ($variacion) use ($productos) { 
            $variacion->productos()->attach(
            $productos->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
    }
}
