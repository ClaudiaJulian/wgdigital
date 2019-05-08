<?php

use Illuminate\Database\Seeder;
use App\Forma;

class FormasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Forma::create([
            'nombre' => 'Adherente',
            'descrip' => ''
            ]); 
        Forma::create([
            'nombre' => 'Entallada',
            'descrip' => ''
            ]); 
        Forma::create([
            'nombre' => 'Recta',
            'descrip' => ''
            ]); 
        Forma::create([
            'nombre' => 'Amplia',
            'descrip' => ''
            ]);                                                 
    }
}
