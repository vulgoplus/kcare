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


	public function index(){
		$this->load->model('Customers_model');
		$data['customers'] = $this->Customers_model->get_all();
		$data['view']      = 'customers/list';
		$this->load->view('layouts_master/admin',$data);
	}

	//Ajax function
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

	public function status($id){
		$this->load->model('Customers_model');
		$this->Customers_model->status($id, $this->input->post('status'));
	}
}
?>