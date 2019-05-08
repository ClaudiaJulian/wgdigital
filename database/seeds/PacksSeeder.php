<?php

use Illuminate\Database\Seeder;
use App\Pack;

class PacksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pack::create([
            'nombre' => 'pack1',
            'items' => '5',
            'apariciones' => '1',
            'v_mes' => '0',
            'v_semestre' => '0',
            'v_anual' => '0',
            'descrip' => ''
            ]);
        Pack::create([
            'nombre' => 'pack2',
            'items' => '15',
            'apariciones' => '3',
            'v_mes' => '1500',
            'v_semestre' => '5000',
            'v_anual' => '10000',
            'descrip' => ''
            ]);            
        Pack::create([
            'nombre' => 'pack3',
            'items' => '25',
            'apariciones' => '5',
            'v_mes' => '3000',
            'v_semestre' => '15000',
            'v_anual' => '25000',
            'descrip' => ''
            ]); 
    }
}
