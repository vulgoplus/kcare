<?php 
/**
* 
*/
class Customers extends CI_controller
{
	
	function __construct()
	{
		parent::__construct();
	}


	public function add(){
		$data = array(
			'name' => $this->input->post('name'),
			'address' => $this->input->post('address'),
			'email'   => $this->input->post('email'),
			'phone'   => $this->input->post('phone')
		);
	}
}
?>