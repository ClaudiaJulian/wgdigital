<?php

use Illuminate\Database\Seeder;
use App\Abono;

class AbonosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Abono::create([
            'nombre' => 'plan1',
            'estrellas' => '3',
            'guardarropa' => '1',
            'capacidad' => '30',
            'outfit' => '30',
            'consultas' => '1',
            'p_mes' => '0',
            'p_sem' => '0',
            'p_anual' => '0'
            ]);

        Abono::create([
            'nombre' => 'plan2',
            'estrellas' => '4',
            'guardarropa' => '1',
            'capacidad' => '100',
            'outfit' => '50',
            'consultas' => '3',
            'p_mes' => '150',
            'p_sem' => '500',
            'p_anual' => '1000'
            ]);            

            Abono::create([
            'nombre' => 'plan3',
            'estrellas' => '5',
            'guardarropa' => '1',
            'capacidad' => '200',
            'outfit' => '100',
            'consultas' => '5',
            'p_mes' => '250',
            'p_sem' => '900',
            'p_anual' => '1500'
            ]);

    }
}
