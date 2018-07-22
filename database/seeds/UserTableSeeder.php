<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
		\DB::table('users')->insert(array (
			0 => 
			array (
				'id'              => 1,
				'nombre'          => 'Admin Admin',
				'email'           => 'admin@gmail.com',
				'username'        => 'admin',
				'password'        => bcrypt('123456'),
				'tipo_usuario_id' => 1,
			),
			1 => 
			array (
				'id'              => 2, 
				'nombre'          => 'Ana Urquiola',
				'email'           => 'anitaurquiola28@gmail.com',
				'username'        => 'anitau28',
				'password'        => bcrypt('anita'),
				'tipo_usuario_id' => 2,
			),
		));
	}

}
