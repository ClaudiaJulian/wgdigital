<?php

use Illuminate\Database\Seeder;
use App\Wardrobe;

class WardrobesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Wardrobe::create([
            'nombre' => 'Primavera-Verano',
            ]);
        Wardrobe::create([
            'nombre' => 'Otoño-Invierno',
            ]);    
        Wardrobe::create([
            'nombre' => 'Ambos',
            ]);                    
    }
}
