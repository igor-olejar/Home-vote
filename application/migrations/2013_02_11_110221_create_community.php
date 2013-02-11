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
                    $table->string('address2', 255)->nullable();
                    $table->string('city', 255);
                    $table->string('county', 255)->nullable();
                    $table->string('country', 255);
                    $table->string('community_image', 255)->nullable();
                    $table->timestamps();
                });
                
                DB::table('community')->insert(array(
			'community_name'    =>  'Happy Street Community',
                        'address1'          =>  'Happy Island 1',
                        'address2'          =>  'Happy Street 2',
                        'city'              =>  'Atlantis',
                        'country'           =>  'Atlantis'
		));
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