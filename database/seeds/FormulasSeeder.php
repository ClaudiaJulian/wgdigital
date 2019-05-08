<?php

use Illuminate\Database\Seeder;
use App\Formula;

class FormulasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Formula::create([
            'cuerpo' => 'Columnar',
                'categoria_1' => 'Top',
                'form_1' => '3',
                'printed_1' => '2',
                'colored_1' => '2',
                'length_1' => '2',

                'categoria_2' => 'Pantalon',
                'form_2' => '2',
                'printed_2' => '2',
                'colored_2' => '1',
                'length_2' => '2',

                'categoria_3' => 'Outwear',
                'form_3' => '2',
                'printed_3' => '1',
                'colored_3' => '1',
                'length_3' => '1'
            ]);
        Formula::create([
            'cuerpo' => 'Reloj',
                'categoria_1' => 'Top',
                'form_1' => '2',
                'printed_1' => '2',
                'colored_1' => '2',
                'length_1' => '2',

                'categoria_2' => 'Pantalon',
                'form_2' => '2',
                'printed_2' => '2',
                'colored_2' => '1',
                'length_2' => '2',

                'categoria_3' => 'Outwear',
                'form_3' => '2',
                'printed_3' => '1',
                'colored_3' => '2',
                'length_3' => '1'
        ]);
        Formula::create([
            'cuerpo' => 'Rectangular',
                'categoria_1' => 'Top',
                'form_1' => '3',
                'printed_1' => '2',
                'colored_1' => '2',
                'length_1' => '2',

                'categoria_2' => 'Pantalon',
                'form_2' => '2',
                'printed_2' => '2',
                'colored_2' => '1',
                'length_2' => '2',

                'categoria_3' => 'Outwear',
                'form_3' => '3',
                'printed_3' => '1',
                'colored_3' => '2',
                'length_3' => '2'
        ]);
        Formula::create([
            'cuerpo' => 'Triangular',
                'categoria_1' => 'Top',
                'form_1' => '3',
                'printed_1' => '1',
                'colored_1' => '2',
                'length_1' => '2',

                'categoria_2' => 'Pantalon',
                'form_2' => '2',
                'printed_2' => '2',
                'colored_2' => '1',
                'length_2' => '2',

                'categoria_3' => 'Outwear',
                'form_3' => '2',
                'printed_3' => '2',
                'colored_3' => '2',
                'length_3' => '2'
        ]);

        Formula::create([
            'cuerpo' => 'Cono',
                'categoria_1' => 'Top',
                'form_1' => '3',
                'printed_1' => '2',
                'colored_1' => '1',
                'length_1' => '2',

                'categoria_2' => 'Pantalon',
                'form_2' => '4',
                'printed_2' => '1',
                'colored_2' => '1',
                'length_2' => '2',

                'categoria_3' => 'Outwear',
                'form_3' => '2',
                'printed_3' => '2',
                'colored_3' => '1',
                'length_3' => '2'
        ]);

        Formula::create([
            'cuerpo' => 'Oval',
                'categoria_1' => 'Top',
                'form_1' => '3',
                'printed_1' => '1',
                'colored_1' => '1',
                'length_1' => '2',

                'categoria_2' => 'Pantalon',
                'form_2' => '3',
                'printed_2' => '2',
                'colored_2' => '2',
                'length_2' => '2',

                'categoria_3' => 'Outwear',
                'form_3' => '3',
                'printed_3' => '2',
                'colored_3' => '1',
                'length_3' => '2'
        ]);


    }
}
