<?php 
	/**
	* 
	*/
	class Agency extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
		}

		/**
		* Generate agency list
		*
		* @return Response
		*/
		public function index(){
			$this->load->model('Agency_model');
			$data['items'] = $this->Agency_model->get();
			$data['view']  = 'agency';
			$this->load->view('layouts_master/admin', $data);
		}

		/**
		* Add agency
		*
		* @return Response
		*/
		public function add(){

			if(!$this->input->post('name'))
				die;

			$data = array(
				'name'    => $this->input->post('name'),
				'address' => $this->input->post('address'),
				'email'   => $this->input->post('email'),
				'phone'   => $this->input->post('phone')
			);

			$this->load->model('Agency_model');
			$this->Agency_model->add($data);
		}

		/**
		* Delete agency
		*
		* @param int $id
		* @return AJAX Response
		*/
		public function delete($id){
			$this->load->model('Agency_model');
			$this->Agency_model->delete($id);
		}

		/**
		* Multiple delete
		* AJAX call
		*
		* @param array $id
		* 
		*/
		public function multi_delete(){
			$this->load->model('Agency_model');
			$id = $this->input->post('id');
			$this->Agency_model->multi_delete($id);
		}
	}
?>