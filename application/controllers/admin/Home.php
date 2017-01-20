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
			redirect(base_url('admin/customers'));
		}
	}
?>