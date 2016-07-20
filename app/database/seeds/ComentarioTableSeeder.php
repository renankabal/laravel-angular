<?php

class ComentarioTableSeeder extends Seeder 
{

	public function run()
	{
		DB::table('comentarios')->delete();

		Comentario::create(array(
			'autor' => 'Felipe Ferreira',
			'comentario' => 'Olha, eu sou um comentário de teste.'
		));

		Comentario::create(array(
			'autor' => 'Rômulo Mendes',
			'comentario' => 'Este vai ser super legal.'
		));

		Comentario::create(array(
			'autor' => 'Lindomar Góes',
			'comentario' => 'Eu sou um mestre em Laravel e Angular.'
		));
	}

}