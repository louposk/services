<?php
class Domain extends Eloquent
{
	public function customer()
     {
          //return $this->belongs_to('Country');
     }

    public function getCustomerName($id) {
    	$c = Customer::where('id','=',$id)->only('name');
    	return $c;
    }
}
?>