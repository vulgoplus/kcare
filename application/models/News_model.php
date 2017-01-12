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

		public function add($news){
			$this->db->insert('news',$news);
		}
	}
?>