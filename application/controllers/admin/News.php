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
			//Load form
			if(!$this->input->post('posted')){
				$data['view'] = 'news/add';
				$this->load->view('layouts_master/admin',$data);
				return;
			}

			//Load Text Helper
			$this->load->helper('MY_text');
			$file_name = $this->do_upload();
			if(!$file_name){
				$news = array(
					'title'       => $this->input->post('title'),
					'sumary'      => $this->MY_text->create_news_sumary($this->input->post('content')),
					'content'     => $this->input->post('content'),
					'image'       => $file_name,
					'category_id' => $this->input->post('category_id'),
					'alias'       => $this->MY_text->create_alias($this->input->post('title'))
				);

				$this->load->model('News_model');
				$this->News_model->add();

				$data['message'] = "Đã thêm thành công!";
				$data['view']    = 'news/list';
				$this->load->view('layouts_master/admin',$data);
			}
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