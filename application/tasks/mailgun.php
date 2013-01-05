<?php 
class Mailgun_Task {
	
	//Bundle::start('Mailgun');

    public function run($args)
    {
    	echo $args;
   //  	Mailgun::message(function($mg) {
			//   $mg->from('louposk@gmail.com')
			//      ->to('louposk@gmail.com')
			//      ->text('shazam');

			//   return $mg;
			// })->deliver();
    }

}

?>