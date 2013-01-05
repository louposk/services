<?php

class Customer_Controller extends Base_Controller {

	public $restful = true;

	public function __construct()
	{
	    parent::__construct();
	}

	public function get_index() 
	{
		$customers = Customer::all();
		return View::make('admin.customer.index', array('customers'=>$customers) );
	}

	public function get_new() {
		return View::make('admin.customer.new');
	}

	public function post_new() {
		$input = Input::all();

        //Rules
        $rules = array(
        'name'  => 'required',
        //'registration' => 'required',
        //'expiration' => 'required',
        //'customer_id' => 'required',
        );

        //If validation fails
        $validation = Validator::make($input, $rules);

        if ($validation->fails())
        {
            return Redirect::to('admin/customer/new')
                ->with('login_errors', true);
            // return $validation->errors;
        }
        else
        {
            $name = Input::get('name');
            $email = Input::get('email');
            $address  = Input::get('address');
            $tel = Input::get('tel');
            $vat = Input::get('vat');
            
            $customer = Customer::create(
                array( 
                    'name' => $name,
                    'email' => $email,
                    'address' => $address,
                    'tel' => $tel,
                    'vat' => $vat,
                    ));
            
            // Message::to('louposk@gmail.com')
            // ->from('me@gmail.com', 'Bob Marley')
            // ->subject('Hello!')
            // ->body('Well hello Someone, how is it going?')
            // ->send();

            return Redirect::to('admin/customer')->with('status', 'Επιτυχία!');;
        }
	}

}