<?php
class Customer extends Eloquent
{
	public function domains()
     {
          return $this->has_many('Domain');
     }
}
?>