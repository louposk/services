<?php

class Create_Users {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('customers', function($table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('email');
			$table->string('address');
			$table->string('tel');
			$table->string('vat');
			$table->timestamps();

		});

		DB::table('customers')->insert(array(
			    'id'  => '1',
			    'name'  => 'Λούπος Κωνσταντίνος',
			    'email'=> 'louposk@gmail.com',
			    'address'=> 'Παπαζώλη 13',
			    'tel'=> '2310525878',
			    'vat' => '03554123',
		));
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('customers');
	}

}