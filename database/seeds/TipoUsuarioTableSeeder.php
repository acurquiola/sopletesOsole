<?php

use Illuminate\Database\Seeder;

class TipoUsuarioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
		\DB::table('tipo_usuarios')->insert(array (
			0 => 
			array (
				'id'              => 1,
				'nombre'          => 'Administrador',
			),
			1 => 
			array (
				'id'              => 2,
				'nombre'          => 'Usuario',
			),
		));
	}

}
