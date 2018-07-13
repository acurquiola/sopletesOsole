<?php

use Illuminate\Database\Seeder;

class TextsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
		\DB::table('texts')->insert(array (
			0 => 
			array (
				'id'        => 1,
				'titulo'    => '50 años de Trayectoria',
				'contenido' => 'Somos una empresa metalúrgica de origen familiar con más de 50 años de trayectoria en el rubro de fabricación de sopletes para soldadura y accesorios para los mismos como válvulas reguladoras de presión, elementos de seguridad, etc. ',
			),
		));
	}

}
