<?php

use Illuminate\Database\Seeder;
use App\Largo;

class LargosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Largo::create([
            'nombre' => 'Corto',
            'descrip' => ''
            ]);
        Largo::create([
            'nombre' => 'Standard',
            'descrip' => ''
            ]);
        Largo::create([
            'nombre' => 'Largo',
            'descrip' => ''
            ]);                        
    }
}
