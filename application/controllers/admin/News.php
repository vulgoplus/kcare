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
			$pagination = $this->initialize_pagination();
			$this->load->model('News_model');
			$data['view'] = 'news/list';
			$data['news'] = $this->News_model->get_news($pagination['per_page']);
			$this->load->view('layouts_master/admin',$data);
		}


		/**
		* Pageination function
		*/
		public function page($page = 1){
			$pagination = $this->initialize_pagination();
			$this->load->model('News_model');
			$data['news'] = $this->News_model->get_news($pagination['per_page'],$page);
			$data['view'] = 'news/list';
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
			$this->_delete_file($id);
			$this->News_model->delete($id);
			echo "Đã xóa thành công!";
		}


		/**
		* Edit news
		*/
		public function edit($id){
			$this->load->model('News_model');
			//If not find POST request, load form add
			if(!$this->input->post('title')){
				$data['view'] = 'news/edit';
				$data['news'] = $this->News_model->get($id);
				$data         = array_merge($this->load_data_master(),$data);
				$this->load->view('layouts_master/admin',$data);
				return;
			}

			//Update news
			$item = $this->News_model->get($id);
			$this->load->helper('text');
			$news = array(
				'title'       => $this->input->post('title'),
				'sumary'      => create_news_sumary($this->input->post('content')),
				'content'     => $this->input->post('content'),
				'category_id' => $this->input->post('category_id'),
				'alias'       => create_alias($this->input->post('title')).$id,
				'date'        => 'CURRENT_TIMESTAMP'
			);


			//Upload file
			if(!empty($_FILES['image']['name'])){
				$news['image'] = $this->do_upload();
			}

			// if upload error 
			if($news['image'] == false){
				$data['error'] = 'Vui lòng kiểm tra lại định dạng ảnh!';
				$data['view']  = 'news/edit';
				$data['news']  = $this->News_model->get($id);
				$data          = array_merge($this->load_data_master(),$data);
				$this->load->view('layouts_master/admin',$data);
				return;
			}

			//if upload success
			$this->_delete_file($id);
			$this->News_model->update($id, $news);
			$this->session->set_flashdata('message','Cập nhật thành công!');
			redirect(base_url('admin/news/edit/'.$id));
		}

		/**
		* Upload file function
		*/
		protected function do_upload(){
			$config['upload_path']   = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|gif|jpeg';

			$this->load->library('upload', $config);
			if(!$this->upload->do_upload('image')){
				print_r($this->upload->display_errors());
				return false;
			}else{
				return $this->upload->data('file_name');
			}
		}

		/**
		* Delete image
		*/
		private function _delete_file($id){
			$this->load->model('News_model');
			$temp = $this->News_model->get($id);
			if(unlink('./uploads/'.$temp['image'])){
				return true;
			}
			return false;
		}

		/**
		* Multiple delete
		*/
		public function multi_delete(){
			$id = $this->input->post('id');
			$this->load->model('News_model');
			$news = $this->News_model->get($id);
			foreach ($news as $item) {
				$this->_delete_file($item['id']);
			}
			$this->News_model->multi_delete($id);
			echo "Đã xóa thành công!";
		}


		//Initialize Pagination
		protected function initialize_pagination(){
			$this->load->model('News_model');
			$this->load->library('pagination');
			$config['base_url']         = base_url('admin/news/');
			$config['total_rows']       = $this->News_model->total_rows();
			$config['per_page']         = 10;
			$config['uri_segment']      = 3;
			$config['use_page_numbers'] = TRUE;
			$config['first_link']       = 'Trang đầu';
			$config['last_link']        = 'Trang cuối';

			$this->pagination->initialize($config);
			return array(
				'per_page'     => $config['per_page'],
				'uri_segment'  => $config['uri_segment']
			);
		}
	}
?>