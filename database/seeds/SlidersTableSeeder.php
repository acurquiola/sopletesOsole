<?php

use Illuminate\Database\Seeder;

class SlidersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
		\DB::table('sliders')->insert(array (
			0 => 
			array (
				'id'         => 1,
				'file'       => 'slider1.jpg',
				'orden'      => 'aa',
				'titulo'     => 'ALTA TECNOLOGÍA AL SERVICIO DE LA INDUSTRIA',
				'subtitulo'  => '50 años en el rubro, fabricantes de sopletes',
				'section_id' => 1,
			),
			1 => 
			array (
				'id'         => 2,
				'file'       => 'slider2.jpg',
				'orden'      => 'bb',
				'titulo'     => 'ALTA TECNOLOGÍA AL SERVICIO DE LA INDUSTRIA',
				'subtitulo'  => 'Equipos medicinales para oxígenosterapia',
				'section_id' => 1,
			),
		));
	}
}
