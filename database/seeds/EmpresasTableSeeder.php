<?php

use Illuminate\Database\Seeder;

class EmpresasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	\DB::table('empresas')->insert(array (
			0 => 
			array (
				'id'         => 1,
				'file_image' => 'quienessomos.jpg',
				'file_video' => 'quienessomos.mp4',
				'texto'      => 'ESTABLECIMIENTO DEL OESTE S.R.L. es una empresa metalúrgica de origen familiar con más de 50 años de trayectoria en el rubro de fabricación de sopletes para soldadura y accesorios para los mismos como válvulas reguladoras de presión, elementos de seguridad, etc. 
En sus comienzos incursionamos en una línea elemental de sopletes para soldadura autógena y válvulas reguladoras de presión para los mismos y con el correr de los años hemos ampliado el nivel de personal y tecnológico para satisfacer las demandas del mercado ofreciendo una amplia línea de productos de los cuales podrá obtener una descripción a continuación en la pagina web.',
			),
		));
    }
}