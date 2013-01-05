<?php

class Create_Domains_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('domains', function($table)
		{
		    $table->increments('id');
		    $table->integer('customer_id');
		    $table->text('name');
		    $table->date('registration');
		    $table->date('expiration');
		    $table->text('dns1');
		    $table->text('dns2');
		    $table->text('epp');
		    $table->text('price');
		    $table->text('status');
		    $table->timestamps();

		    //
		    // $table->primary(array('product_id', 'language_id'));
		    //Primary key
		    // $table->primary('id');
		});

		DB::table('domains')->insert(array(
			    'id'  => '',
			    'customer_id' => '1',
			    'name'  => 'www.bekae.gr',
			    'registration'=> '2012-11-11',
			    'expiration'=> '2013-11-11',
			    'dns1'=> '',
			    'dns2' => '',
			    'epp' => '',
			    'price' => '',
			    'status' => '1'

		));
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('domains');
	}

}