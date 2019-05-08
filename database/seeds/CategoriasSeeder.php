<?php

use Illuminate\Database\Seeder;
use App\Categoria;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            Categoria::create([
                'name' => 'Top',
            ]);
            Categoria::create([
                'name' => 'Pantalon',
            ]);          
            Categoria::create([
                'name' => 'Falda',
            ]);
            Categoria::create([
                'name' => 'Outwear',
                ]);
            Categoria::create([
                'name' => 'Vestido',
            ]);
            Categoria::create([
                'name' => 'Cartera',
                ]);
            Categoria::create([
                'name' => 'Zapatos',
                ]);
            Categoria::create([
                'name' => 'Bijoutery',
                ]);
            Categoria::create([
                'name' => 'Anteojos',
                ]);
            Categoria::create([
                'name' => 'Pañuelos',
                ]);
            Categoria::create([
                'name' => 'Servicios',
                ]);                                                                
    }
}
