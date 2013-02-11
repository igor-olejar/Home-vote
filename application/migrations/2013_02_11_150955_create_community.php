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
                    $table->text('community_info')->nullable();
                    $table->timestamps();
                });
                
                DB::table('community')->insert(array(
			'community_name'    =>  'Happy Street Community',
                        'address1'          =>  'Happy Island 1',
                        'address2'          =>  'Happy Street 2',
                        'city'              =>  'Atlantis',
                        'country'           =>  'Atlantis',
                        'community_info'    =>  'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vel fringilla nunc. Donec venenatis placerat leo in porttitor. Sed vel aliquet urna. Sed arcu mauris, sollicitudin eu egestas tempus, laoreet in ante. Mauris aliquam dictum velit, vitae rhoncus mi eleifend in. Sed et nisl urna. Ut nunc purus, interdum sed aliquam vitae, suscipit ac felis. Donec id risus metus. Vestibulum at enim nibh, at pretium augue. Pellentesque sed turpis libero.',
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