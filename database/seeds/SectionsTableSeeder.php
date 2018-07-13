<?php

use Illuminate\Database\Seeder;

class SectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
		\DB::table('sections')->insert(array (
			0 => 
			array (
				'id' => 1,
				'nombre' => 'Home',
			),
			1 => 
			array (
				'id' => 2,
				'nombre' => 'Empresa',
			),
			2 => 
			array (
				'id' => 3,
				'nombre' => 'Productos',
			),
			3 => 
			array (
				'id' => 4,
				'nombre' => 'Descargas',
			),
			4 => 
			array (
				'id' => 5,
				'nombre' => 'Calidad',
			),
			5 => 
			array (
				'id' => 6,
				'nombre' => 'Servicios',
			),
			6 => 
			array (
				'id' => 7,
				'nombre' => 'Contacto',
			),
		));
	}

}
