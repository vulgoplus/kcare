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
		public function get_all_news(){
			$this->db->select('news.id, title, category_name, date');
			$this->db->from('news');
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
	}
?>