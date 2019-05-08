<?php

use Illuminate\Database\Seeder;
use App\Cuerpo;

class CuerposSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cuerpo::create([
            'nombre' => 'Reloj',
            'descrip' => ''
            ]);
        Cuerpo::create([
            'nombre' => 'Columnar',
            'descrip' => ''
            ]);
        Cuerpo::create([
            'nombre' => 'Rectangular',
            'descrip' => ''
            ]);                        
        Cuerpo::create([
            'nombre' => 'Triangular',
            'descrip' => ''
            ]);            
        Cuerpo::create([
            'nombre' => 'Cono',
            'descrip' => ''
            ]);
        Cuerpo::create([
            'nombre' => 'Oval',
            'descrip' => ''
            ]);
    }
}
