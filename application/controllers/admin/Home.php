<?php 
	/**
	* 
	*/
	class Home extends CI_controller
	{
		
		function __construct()
		{
			parent::__construct();
		}

		public function index(){
			$data['view'] = 'test';
			$this->load->view('layouts_master/admin',$data);
		}
	}
?>