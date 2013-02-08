<?php

class Create_Messages {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('messages', function($table){
                    $table->increments('id');
                    $table->integer('id_from');
                    $table->integer('id_to');
                    $table->string('subject', 255);
                    $table->text('body');
                    $table->boolean('read')->default(0);
                    $table->boolean('replied')->default(0);
                    $table->integer('parent_id')->nullable();
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
		Schema::drop('messages');
	}

}