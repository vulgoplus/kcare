<?php 
	
	/**
	* 
	*/
	class Agency_model extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();
		}


		/**
		* Add agency
		*
		* @param array $data
		* @return none
		*/
		public function add($data){
			$this->db->insert('agency',$data);
		}

		/**
		* Get all list
		*
		* @return array Agency list
		*/
		public function get(){
			$this->db->order_by('id','DESC');
			return $this->db->get('agency')->result_array();
		}

		/**
		* Delete by ID
		*
		* @param int $id
		* @return none
		*/
		public function delete($id){
			$this->db->where('id',$id);
			$this->db->delete('agency');
		}


		/**
		* Multiple delete
		*
		* @param array $id
		* @return none
		*/
		public function multi_delete($id){
			$this->db->where_in('id',$id);
			$this->db->delete('agency');
		}
	}
	
?>