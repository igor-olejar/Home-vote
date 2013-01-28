<?php

class Create_Users {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table){
			$table->increments('id');
			$table->string('username', 64);
			$table->string('password', 64);
			$table->string('name', 128);
                        $table->string('email', 255);
                        $table->integer('group');
                        $table->boolean('active');
			$table->timestamps();
		});

		DB::table('users')->insert(array(
			'username'	=>	'admin',
			'password'	=>	Hash::make('password'),
			'name'		=>	'Admin',
                        'email'         =>      'igor.olejar@gmail.com',
                        'group'         =>      1
		));
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}