<?php

class Base_Controller extends Controller {

		//Register css and js files
	public function __construct()
	{
	    parent::__construct();
   	 	Asset::add('style', 'css/style.css');

	}


	/**
	 * Catch-all method for requests that can't be matched.
	 *
	 * @param  string    $method
	 * @param  array     $parameters
	 * @return Response
	 */
	public function __call($method, $parameters)
	{
		return Response::error('404');
	}

}