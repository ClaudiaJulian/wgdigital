<?php

use Illuminate\Database\Seeder;
use App\Color;

class ColoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Color::create([
            'nombre' => 'Neutros',
            'descrip' => ''
            ]);
        Color::create([
            'nombre' => 'Otros Colores',
            'descrip' => ''
            ]);            
    }
}
