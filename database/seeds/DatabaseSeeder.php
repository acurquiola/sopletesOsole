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
         $this->call(TipoUsuarioTableSeeder::class);
         $this->call(UserTableSeeder::class);
         $this->call(SectionsTableSeeder::class);
         $this->call(DestacadosTableSeeder::class);
         $this->call(TextsTableSeeder::class);
         $this->call(EmpresasTableSeeder::class);
         $this->call(CalidadsTableSeeder::class);
         $this->call(ServiciosTableSeeder::class);
         $this->call(SlidersTableSeeder::class);
         $this->call(FamiliasTableSeeder::class);
         $this->call(ProductosTableSeeder::class);
    }
}
