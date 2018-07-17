<?php

use Illuminate\Database\Seeder;

class ProductosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
		\DB::table('productos')->insert(array (
			0 => 
			array (
				'id'          => 1,
				'nombre'      => 'Sopletes de Oxicorte',
				'descripcion' => 'Los cabezales cortadores son aplicables a los mangos modelo M24 para ejecutar cortes de espesores de 3 a 300 mm. con sistema de inyección de oxígeno de corte a mariposa, ofreciéndolos para ser utilizados con gas acetileno y oxigeno ó gas propano-butano y oxigeno. Los mismos son de construcción sólida y utilizan un sistema de picos de corte construidos en cobre para altas temperaturas, y provistos de accesorios como carros para realizar cortes rectos y oblicuos, y el compás para cortar círculos',
				'orden'       => 'aa',
				'file'        => null,
				'file_image'  => 'producto1.jpg',
				'familia_id'  => 3,
				'galeria'     => 0,
				'etiqueta'    => 0,
			),
		));
	}
}
