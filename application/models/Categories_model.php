<?php 
	/**
	* 
	*/
	class Categories_model extends CI_model
	{
		
		function __construct()
		{
			parent::__construct();
		}

		/**
		* Get all categories
		* @param none
		* @return array: Categories list
		*/
		public function get_all_categories(){
			return $this->db->get('categories')->result_array();
		}
	}
?>