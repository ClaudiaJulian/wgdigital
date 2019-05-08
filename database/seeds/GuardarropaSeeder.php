<?php

use Illuminate\Database\Seeder;
use App\Guardarropa;

class GuardarropaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Guardarropa::create([
            'user_id' => '1',
            ]);
        Guardarropa::create([
            'user_id' => '2',
            ]);
        Guardarropa::create([
            'user_id' => '3',
            ]);
        Guardarropa::create([
            'user_id' => '4',
            ]);                        
    }
}
