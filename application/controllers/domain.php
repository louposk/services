<?php

class Domain_Controller extends Base_Controller {

	public $restful = true;
	
	public function get_index() 
	{
		$domains = Domain::all();
    	return View::make('admin.domain.index', array('domains'=>$domains));
	}

	public function get_new() {
        $customers = Customer::all();
		return View::make('admin.domain.new', array('customers'=>$customers));
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
            return Redirect::to('admin/domain/new')
                ->with('login_errors', true);
            // return $validation->errors;
        }
        else
        {
            $name = Input::get('name');
            $registration = Input::get('registration');
            $expiration  = Input::get('expiration');
            $dns1 = Input::get('dns1');
            $dns2 = Input::get('dns2');
            $epp = Input::get('epp');
            $price = Input::get('price');
            $status = Input::get('status');
            $customer_id = Input::get('customer_id');
     
            $domain = Domain::create(
                array( 
                    'id' => '',
                    'name' => $name,
                    'registration' => $registration,
                    'expiration' => $expiration,
                    'dns1' => $dns1,
                    'dns2' => $dns2,
                    'epp' => $epp,
                    'price' => $price,
                    'status' => $status,
                    'customer_id' => $customer_id
                    ));
            
            // Message::to('louposk@gmail.com')
            // ->from('me@gmail.com', 'Bob Marley')
            // ->subject('Hello!')
            // ->body('Well hello Someone, how is it going?')
            // ->send();

            return Redirect::to('admin/domain');
        }
	}

	public function get_edit($id = null) {
		$domain = Domain::find($id);
        $customers = Customer::all();
        // $customers = $domain->
    	return View::make('admin.domain.edit',array('domain'=>$domain,'customers'=>$customers) );
	}

	public function post_update() {
		$domain = Domain::find(Input::get('id'));

        // if(isset($domain)) {echo "Iparxei";} else {echo "Den iparxei";}
        $domain->name = Input::get('name');
        $domain->registration = Input::get('registration');
        $domain->expiration = Input::get('expiration');
        $domain->dns1 = Input::get('dns1');
        $domain->dns2 = Input::get('dns2');
        $domain->epp = Input::get('epp');
        $domain->price = Input::get('price');
        $domain->customer_id = Input::get('customer_id');

        $domain->save();

        $mailer = IoC::resolve('mailer');
        // $transport = Swift_SmtpTransport::newInstance('smtp.example.org', 25);

        $transport = Swift_SmtpTransport::newInstance('smtp.tellas.gr', 25);
        // Create the Mailer using your created Transport
        $mailer = Swift_Mailer::newInstance($transport);

        $message = Swift_Message::newInstance('Subject Of Email')
            ->setFrom(array('webmaster@projectteam.gr'=>'Project Team - Ζήση Αντωνία'))
            ->setTo(array('louposk@gmail.com'=>'Mr Example'))
            ->addPart('My Plain Text Message','text/plain')
            ->setBody('My HTML Message','text/html');

        // Send the email
        $numSent = $mailer->send($message);

        $mail = "Sent %d messages\n".$numSent;

        //Pass a variable name to the send() method
        if (!$mailer->send($message, $failures))
        {
          echo "Failures:";
          print_r($failures);
        }

        return Redirect::to('admin/domain')->with('status',$mail);
	}

	public function get_delete($id = null) {
		$domain = Domain::find($id);

            if(isset($domain)) {
                $domain->delete();
                $success = "Deleted successfully!";
                return Redirect::to('admin/domain')->with('status', $success);
			}
	}


    public function get_email() {
        Command::run(array('email'));
    }

}