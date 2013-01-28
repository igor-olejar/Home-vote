<?php

class Create_User_Groups {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_groups', function($table){
			$table->increments('id');
			$table->string('group_name', 32);
                        $table->integer('level');
		});
                
                DB::table('user_groups')->insert(array(
			'group_name'	=>	'admin',
			'level'         =>      1
		));
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}