<?php  
	/**
	* 
	*/
	class Customers_model extends CI_model
	{
		
		function __construct()
		{
			parent::__construct();
		}

		/**
		* Get price by program, age, sex
		* @param $program int: Program selected
		* @param $age int: customer age
		* @param $sex int: customer sex
		* @return int: Price
		*/
		public function get_price($program, $age, $sex){
			$this->db->select('price');
			$data = array(
				'age'     => $age,
				'program' => $program,
				'sex'     => $sex
			);
			$this->db->where($data);
			return $this->db->get('price_list')->result_array()[0]['price'];
		}

		/**
		* Add customer
		* @param $cusomer array: Customer info
		* @return none
		*/
		public function add($customer){
			$this->db->insert('customers',$customer);
		}

		/**
		* Get all customers
		* @return customers list
		*/
		public function get($per_page, $offset = 1){
			$this->db->order_by('id','DESC');
			$this->db->limit($per_page, ($offset - 1) * $per_page);
			return $this->db->get('customers')->result_array();
		}

		public function status($id,$status){
			$this->db->where('id',$id);
			$this->db->set('status',$status);
			$this->db->update('customers');
		}

		public function delete($id){
			$this->db->where('id',$id);
			$this->db->delete('customers');
		}

		public function multi_delete($id){
			$this->db->where_in('id', $id);
			$this->db->delete('customers');
		}

		public function get_customer_by_id($id){
			$this->db->where('id', $id);
			return $this->db->get('customers')->result_array()[0];
		}

		public function total_rows(){
			return $this->db->count_all_results('customers');
		}
	}
?>