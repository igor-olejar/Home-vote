<?php

class Create_Community {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('community', function($table){
                    $table->increments('id');
                    $table->string('community_name', 255);
                    $table->string('address1', 255);
                    $table->string('address2', 255);
                    $table->string('city', 255);
                    $table->string('county', 255)->nullable();
                    $table->string('country', 255);
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
		Schema::drop('community');
	}

}