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
         $this->call(SectionsTableSeeder::class);
         $this->call(DestacadosTableSeeder::class);
         $this->call(TextsTableSeeder::class);
    }
}
