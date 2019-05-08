<?php

use Illuminate\Database\Seeder;
use App\Estampado;

class EstampadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Estampado::create([
            'nombre' => 'Si',
            'descrip' => ''
            ]);
        Estampado::create([
            'nombre' => 'No',
            'descrip' => ''
            ]);            
    }
}
