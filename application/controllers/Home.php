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
		$this->load->view('landing_page');
	}
}

?>