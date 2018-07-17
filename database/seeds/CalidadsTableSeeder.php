<?php

use Illuminate\Database\Seeder;

class CalidadsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	\DB::table('calidads')->insert(array (
			0 => 
			array (
				'id'     => 1,
				'titulo' => 'Alta Tecnología al Servicio de la Industria',
				'texto'  => 'Esta política de la empresa nos a permitido cubrir todo el mercado nacional reconociendo la marca, lo que nos incentiva para hacer llegar el producto al mercado exterior como ya hemos realizado en experiencias previas en algunos países.
				En pocas palabras apostamos a futuro el continuo mejoramiento tecnológico que demandan los mercados cumpliendo con la garantía y las diferentes normas de funcionamiento y calidad, juntamente con la mejor relación comercial y de intercambio de opiniones con nuestros distribuidores y usuario, anteponiendo nuestro lema ALTA TECNOLOGÍA  AL SERVICIO DE LA INDUSTRIA. ',
			),
		));
    }
}
