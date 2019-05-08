<?php

use Illuminate\Database\Seeder;
use App\Producto;

class ProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Producto::create([
            'user_id' => '11',
            'name' => 'Bombay',
            'brand' => 'Catalina',
            'categoria_id' => '4',
            'printed' =>'2',
            'colored' => '1',
            'form' => '3',
            'length' => '1',
            'tipo_w' => '3',
            'precio' => '1500',
            'descuento' => '10',
            'qReservas' => '11',
            'on_off' => 'on',
            'descrip' => 'Buzo Negro con inscripción en los brazos. COLORES DISPONIBLES: Rojo, Blanco y Azul. TALLES: Pequeño, Medio, Large, XLarge.',

            ]);

        Producto::create([
            'user_id' => '12',
            'name' => 'Retro',
            'brand' => 'Materia',
            'categoria_id' => '4',
            'printed' =>'2',
            'colored' => '1',
            'form' => '3',
            'length' => '1',
            'tipo_w' => '3',
            'precio' => '1500',
            'descuento' => '10',
            'qReservas' => '11',
            'on_off' => 'on',
            'descrip' => 'Buzo Negro con inscripción en los brazos. COLORES DISPONIBLES: Rojo, Blanco y Azul. TALLES: Pequeño, Medio, Large, XLarge.',
    
            ]);            

        Producto::create([
            'user_id' => '13',
            'name' => 'Malibu',
            'brand' => 'Lion',
            'categoria_id' => '4',
            'printed' =>'2',
            'colored' => '1',
            'form' => '3',
            'length' => '1',
            'tipo_w' => '3',
            'precio' => '1500',
            'descuento' => '10',
            'qReservas' => '11',
            'on_off' => 'on',
            'descrip' => 'Buzo Negro con inscripción en los brazos. COLORES DISPONIBLES: Rojo, Blanco y Azul. TALLES: Pequeño, Medio, Large, XLarge.',
        
            ]);                
        
    }
}
