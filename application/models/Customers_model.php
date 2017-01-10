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

		public function add($customer){
			$this->db->insert('customers',$customer);
		}
	}
?>