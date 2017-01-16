<?php 

	/**
	* 
	*/
	class News extends MY_controller
	{
		
		function __construct()
		{
			parent::__construct();
		}

		public function index(){
			$this->load->model('News_model');
			$data['featured']    = $this->News_model->featured();
			$data['hots']        = $this->News_model->get_news(5);
			$data['month_posts'] = $this->News_model->month_posts();
			$data['populars']    = $this->News_model->popular_posts();
			$data 				 = array_merge($data,$this->load_data_master());
			$this->load->view('news/home',$data);
		}
	}
 ?>