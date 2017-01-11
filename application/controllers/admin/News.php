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

		public function add(){
			if(!$this->input->post('posted')){
				$data['view'] = 'news/add';
				$this->load->view('layouts_master/admin',$data);
				return;
			}

			$news = array(
				'title'   => $this->input->post('title')
			);
		}

		protected function do_upload(){
			$config['upload_path']   = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|gif';

			$this->load->library('upload', $config);

			if(!$this->upload->do_upload('image')){
				return false;
			}else{
				return $this->upload->data('file_name');
			}
		}
	}
?>