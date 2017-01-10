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
		public function get_all(){
			$this->db->order_by('id','DESC');
			return $this->db->get('customers')->result_array();
		}

		public function status($id,$status){
			$this->db->where('id',$id);
			$this->db->set('status',$status);
			$this->db->update('customers');
		}
	}
?>