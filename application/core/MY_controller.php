<?php 
	/**
	* 
	*/
	class MY_controller extends CI_controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->library('session');
		}

		public function load_data_master(){
			$this->load->model('Categories_model');
			$data['categories'] = $this->Categories_model->get_all_categories();
			return $data;
		}
	}
?>