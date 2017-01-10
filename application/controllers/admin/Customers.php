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
			'phone'   => $this->input->post('phone'),
			'sex'     => $this->input->post('sex'),
			'program' => $this->input->post('program'),
			'age'     => $this->input->post('age')
		);

		$this->load->model('Customers_model');
		$this->Customers_model->add($data);
	}

	public function get_price(){
		$program = $this->input->post('program');
		$sex     = $this->input->post('sex');
		$age     = $this->input->post('age');

		$this->load->model('Customers_model');
		echo number_format($this->Customers_model->get_price($program, $age, $sex));
	}
}
?>