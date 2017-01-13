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

		/**
		* Load news list
		*/
		public function index(){
			$this->load->model('News_model');
			$data['view'] = 'news/list';
			$data['news'] = $this->News_model->get_all_news();
			$this->load->view('layouts_master/admin',$data);
		}


		//Add news
		public function add(){
			//Load form
			if(!$this->input->post('posted')){
				$data['view'] = 'news/add';
				$data         = array_merge($this->load_data_master(),$data);
				$this->load->view('layouts_master/admin',$data);
				return;
			}

			//Load Text Helper
			$this->load->helper('text');

			//Upload file and get name
			$file_name = $this->do_upload();
			if($file_name != false){
				$news = array(
					'title'       => $this->input->post('title'),
					'sumary'      => create_news_sumary($this->input->post('content')),
					'content'     => $this->input->post('content'),
					'image'       => $file_name,
					'category_id' => $this->input->post('category_id'),
					'alias'       => create_alias($this->input->post('title'))
				);
				$this->load->model('News_model');
				$this->News_model->add($news);

				$data['view']    = 'news/list';
				$this->session->set_flashdata('message','Thêm thành công!');
				redirect(base_url('admin/news'));
			}else{
				$data['message'] = 'Có lỗi trong quá trình tải ảnh lên, vui lòng kiểm tra lại!';
				$data['view']    = 'news/add';
				$data            = array_merge($this->load_data_master(),$data);
				$this->load->view('layouts_master/admin',$data);
				return;
			}
		}

		/**
		* Delete news
		*/
		public function delete($id){
			$this->load->model('News_model');
			$this->News_model->delete($id);
			echo "Đã xóa thành công!";
		}

		/**
		* Upload file function
		*/
		protected function do_upload(){
			$config['upload_path']   = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|gif';

			$this->load->library('upload', $config);
			if(!$this->upload->do_upload('image')){
				print_r($this->upload->display_errors());
				return false;
			}else{
				return $this->upload->data('file_name');
			}
		}

		public function multi_delete(){
			$id = $this->input->post('id');
			$this->load->model('News_model');
			$this->News_model->multi_delete($id);
			echo "Đã xóa thành công!";
		}
	}
?>