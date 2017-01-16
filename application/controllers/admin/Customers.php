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


 
	/**
	* Customer homepage
	*/
	public function index(){
		$pagination = $this->initialize_pagination();
		$this->load->model('Customers_model');
		$data['customers'] = $this->Customers_model->get($pagination['per_page'],1);
		$data['view']      = 'customers/list';
		$this->load->view('layouts_master/admin',$data);
	}

	/**
	* Pagination
	*/
	public function page($page = 1){
		$pagination = $this->initialize_pagination();
		$this->load->model('Customers_model');
		$data['customers'] = $this->Customers_model->get($pagination['per_page'],$page);
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

	//Ajax: get price and format
	public function get_price(){
		$program = $this->input->post('program');
		$sex     = $this->input->post('sex');
		$age     = $this->input->post('age');
		$this->load->model('Customers_model');
		echo number_format($this->Customers_model->get_price($program, $age, $sex));
	}

	//Change status of customer function
	public function status($id){
		$this->load->model('Customers_model');
		$this->Customers_model->status($id, $this->input->post('status'));
	}

	/**
	* Delete function
	* Please call with ajax
	* @param $id int: Customer ID
	*/
	public function delete($id){
		$this->load->model('Customers_model');
		$this->Customers_model->delete($id);
	}

	/**
	* Multiple delete
	* Call with AJAX
	*/
	public function multi_delete(){
		$id = $this->input->post('id');
		$this->load->model('Customers_model');
		$this->Customers_model->multi_delete($id);
	}

	/**
	* Customer detail
	* @param $id int: Customer ID
	*/
	public function view($id){
		$this->load->model('Customers_model');
		$data['customer'] = $this->Customers_model->get_customer_by_id($id);
		$data['view']     = 'customers/view';
		$this->load->view('layouts_master/admin',$data);
	}


	/**
	* Initilize pagination
	*/
	protected function initialize_pagination(){
		$this->load->model('Customers_model');
		$this->load->library('pagination');
		$config['base_url']         = base_url('admin/customers/');
		$config['total_rows']       = $this->Customers_model->total_rows();
		$config['per_page']         = 15;
		$config['uri_segment']      = 3;
		$config['use_page_numbers'] = TRUE;
		$config['first_link']       = 'Trang đầu';
		$config['last_link']        = 'Trang cuối';

		$this->pagination->initialize($config);
		return array(
			'per_page'     => $config['per_page'],
			'uri_segment'  => $config['uri_segment']
		);
	}
}
?>