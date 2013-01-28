<?php

class Create_Tokens {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tokens', function($table){
			$table->increments('id');
			$table->string('value', 16);
			$table->string('type', 16);
                        $table->integer('user_id');
                        $table->boolean('used');
			$table->timestamps();
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tokens');
	}

}