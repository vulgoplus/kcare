<?php 

	/**
	* 
	*/
	class News extends CI_controller
	{
		
		function __construct()
		{
			parent::__construct();
		}

		public function index(){
			$this->load->model('News_model');
			$data['featured']    = $this->News_model->featured();
			$data['new_posts']   = $this->News_model->new_posts();
			$this->load->view('news/news',$data);
		}

		public function single($alias){
			$this->load->model('News_model');
			$data['news'] = $this->News_model->get_by_alias($alias);
			$this->load->view('news/single',$data);
		}
	}
 ?>