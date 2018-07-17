<?php

use Illuminate\Database\Seeder;

class ServiciosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
		\DB::table('servicios')->insert(array (
			0 => 
			array (
				'id'         => 1,
				'icono'      => 'servicios_logo1.png',
				'file_image' => 'servicios1.png',
				'titulo'     => 'Reparación',
				'contenido'  => 'Basándonos en el desarrollo tecnológico y capacitación profesional la empresa a puesto su esfuerzo en la mejora continua en calidad y funcionamiento de los productos y ofreciendo un servicio post-venta que satisfaga las demandas de nuestros distribuidores y usuarios ofreciéndole todo el servicio técnico y de capacitación que sea necesario para el correcto funcionamiento de los equipos. ',
			),
			1 => 
			array (
				'id'         => 2,
				'icono'      => 'servicios_logo2.png',
				'file_image' => 'servicios2.png',
				'titulo'     => 'Post Venta',
				'contenido'  => 'En Sopletes Liga ofrecemos un servicio post-venta que satisface las demandas de nuestros distribuidores y usuarios ofreciéndole todo el servicio técnico y de capacitación que sea necesario para el correcto funcionamiento de los equipos. ',
			),
			2 => 
			array (
				'id'         => 3,
				'icono'      => 'servicios_logo3.png',
				'file_image' => 'servicios3.png',
				'titulo'     => 'Equipos',
				'contenido'  => 'Uno de nuestros principales objetivos como compañía es la continua búsqueda y desarrollo tecnológico. Nuestros esfuerzos están puestos en  la mejora continua en calidad y funcionamiento de los productos. Contamos con un equipo de trabajo capacitado para brindar los mejores productos y los servicios más eficientes.',
			),
		));
	}}