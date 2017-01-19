<?php 
	/**
	* 
	*/
	class News_model extends CI_model
	{
		
		function __construct()
		{
			parent::__construct();
		}

		/**
		* Add new News
		* @param $news array: Data
		* @return Inserted ID
		*/
		public function add($news){
			return $this->db->insert('news',$news);
		}

		/**
		* Get all news
		* @param none
		* @return news list
		*/
		public function get_news($per_page, $offset=1){
			$this->db->select('news.id, title, category_name, date, sumary, image');
			$this->db->from('news');
			$this->db->order_by('id','DESC');
			$this->db->limit($per_page, ($offset-1)*$per_page);
			$this->db->join('categories','news.category_id = categories.id');
			return $this->db->get()->result_array();
		}

		/**
		* Delete news by id
		* @param $id news id
		* @return none
		*/
		public function delete($id){
			$this->db->where('id',$id);
			$this->db->delete('news');
		}

		/**
		* Delete multiple news
		* @param $id array: ID list
		* @return none
		*/
		public function multi_delete($id){
			$this->db->where_in('id', $id);
			$this->db->delete('news');
		}

		/**
		* Get news
		* @param $id int: ID
		* @return array: News
		*/
		public function get($id){
			if(is_array($id)){
				$this->db->where_in('id', $id);
				return $this->db->get('news')->result_array();
			}else{
				$this->db->where('id', $id);
				return $this->db->get('news')->result_array()[0];
			}	
		}


		/**
		* Update News
		*
		* @param $id int: News ID
		* @param $data array: News
		* @return none
		*/
		public function update($id, $data){
			$this->db->where('id',$id);
			$this->db->update('news',$data);
		}

		/**
		* Count all record in SQL table
		* @return int: number of record in News Table
		*/
		public function total_rows(){
			return $this->db->count_all_results('news');
		}

		/**
		* Select featured News
		*
		* @return array Featured post
		*/
		public function featured(){
			$this->db->select('title,image,alias');
			$this->db->limit(8,1);
			return $this->db->get('news')->result_array();
		}

		/**
		* Get new posts
		*
		* @return array New posts
		*/
		public function new_posts(){
			$this->db->select('title, image, alias');
			$this->db->order_by('id','DESC');
			$this->db->limit(6,1);
			return $this->db->get('news')->result_array();
		}
	}
?>