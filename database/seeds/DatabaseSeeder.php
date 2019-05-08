<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(CategoriasSeeder::class);
        // $this->call(GuardarropaSeeder::class);
        $this->call(FormulasSeeder::class);
        $this->call(CuerposSeeder::class);
        $this->call(LargosSeeder::class);
        $this->call(ColoresSeeder::class);
        $this->call(EstampadoSeeder::class);
        $this->call(FormasSeeder::class);
        $this->call(AbonosSeeder::class);
        $this->call(PacksSeeder::class);
        $this->call(WardrobesSeeder::class);
        $this->call(ProductosSeeder::class);
        $this->call(ItemsSeeder::class);
    }
}
