<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Claudia Julian',
            'email' => 'clau@yahoo.com.ar',
            'password' => hash::make('12345678'),
            'b_shape' => '1',
            'role' => 'adm',
            ]);

        User::create([
            'name' => 'Claudia',
            'email' => 'c1@hotmail.com',
            'password' => hash::make('12345678'),
            'b_shape' => '1',
            'role' => 'adm',
            ]);

        User::create([
            'name' => 'Claudia',
            'email' => 'c2@hotmail.com',
            'password' => hash::make('12345678'),
            'b_shape' => '1',
            'role' => 'adm',
            ]);
            
        User::create([
            'name' => 'Claudia',
            'email' => 'c3@hotmail.com',
            'password' => hash::make('12345678'),
            'b_shape' => '1',
            'role' => 'adm',
            ]);                        

        User::create([
            'name' => 'Roma',
            'email' => 'r1@hotmail.com',
            'password' => hash::make('12345678'),
            'b_shape' => '1',
            'abono' => '1',
            ]);

        User::create([
            'name' => 'Sicilia',
            'email' => 's1@hotmail.com',
            'password' => hash::make('12345678'),
            'b_shape' => '2',
            'abono' => '1',
            ]);

        User::create([
            'name' => 'Brescia',
            'email' => 'b1@hotmail.com',
            'password' => hash::make('12345678'),
            'b_shape' => '3',
            'abono' => '1',
            ]);

        User::create([
            'name' => 'Trevi',
            'email' => 't1@hotmail.com',
            'password' => hash::make('12345678'),
            'b_shape' => '4',
            'abono' => '1',
            ]);

        User::create([
            'name' => 'Milano',
            'email' => 'm1@hotmail.com',
            'password' => hash::make('12345678'),
            'b_shape' => '5',
            'abono' => '1',
            ]);

        User::create([
            'name' => 'Siena',
            'email' => 'si1@hotmail.com',
            'password' => hash::make('12345678'),
            'b_shape' => '6',
            'abono' => '1',
            ]);            

        User::create([
            'name' => 'Catalina',
            'email' => 'agarrate@hotmail.com',
            'cuit' => '1234567890',
            'referente' => 'Maria Perez',
            'direccion' => 'Paunero 234 San Miguel',
            'password' => hash::make('12345678'),
            'role' => 'seller',
            'pack' => '1',
            ]);            

        User::create([
            'name' => 'Materia',
            'email' => 'materia@hotmail.com',
            'cuit' => '1234567890',
            'referente' => 'Juan Godoy',
            'direccion' => 'Alvear 100 Martinez',
            'password' => hash::make('12345678'),
            'role' => 'seller',
            'pack' => '1',
            ]);            

        User::create([
            'name' => 'Lion Boutique',
            'email' => 'lion@hotmail.com',
            'cuit' => '1234567890',
            'referente' => 'Carolina Gusman',
            'direccion' => 'Misiones 345 Olivos',
            'password' => hash::make('12345678'),
            'role' => 'seller',
            'pack' => '1',
            ]);                        

    }
}
