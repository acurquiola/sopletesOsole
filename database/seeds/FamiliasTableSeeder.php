<?php

use Illuminate\Database\Seeder;

class FamiliasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
		\DB::table('familias')->insert(array (
			0 => 
			array (
				'id'         => 1,
				'nombre'     => 'VÁLVULAS REGULADORAS DE PRESIÓN',
				'file_image' => 'familias1.jpg',
			),
			1 => 
			array (
				'id'         => 2,
				'nombre'     => 'SOPLETES PARA SOLDADURAS AUTÓGENAS',
				'file_image' => 'familias2.jpg',
			),
			2 => 
			array (
				'id'         => 3,
				'nombre'     => 'SOPLETES DE OXICORTE',
				'file_image' => 'familias3.jpg',
			),
			3 => 
			array (
				'id'         => 4,
				'nombre'     => 'SOPLETES PARA GAS ENVASADO',
				'file_image' => 'familias4.jpg',
			),
			4 => 
			array (
				'id'         => 5,
				'nombre'     => 'MINIEQUIPOS',
				'file_image' => 'familias5.jpg',
			),
			5 => 
			array (
				'id'         => 6,
				'nombre'     => 'VÁLVULAS REGULADORAS DE PRESIÓN PAR USO MEDICINAL',
				'file_image' => 'familias6.jpg',
			),
		));
	}
}
