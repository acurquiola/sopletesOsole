<?php

use Illuminate\Database\Seeder;

class DestacadosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
		\DB::table('destacados')->insert(array (
			0 => 
			array (
				'id'     => 1,
				'file'   => 'destacados1.jpg',
				'titulo' => 'SOPLETES TIPO LLUVIA PARA CALENTAMIENTO',
				'orden'  => 'aa',
			),
			1 => 
			array (
				'id' => 2,
				'file'   => 'destacados2.jpg',
				'titulo' => 'SOPLETE NÚMERO 1 JOYERO SIN MANGUERA',
				'orden'  => 'bb',
			),
			2 => 
			array (
				'id' => 3,
				'file'   => 'destacados3.jpg',
				'titulo' => 'MINI SOLDADORA OXI-GAS',
				'orden'  => 'cc',
			),
			3 => 
			array (
				'id' => 4,
				'file'   => 'destacados4.jpg',
				'titulo' => 'REGULADOR VALR327 CO2',
				'orden'  => 'dd',
			),
		));
	}

}
