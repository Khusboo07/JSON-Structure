<?php
	class Employee_Model extends CI_Model {
		
		function __construct(){
			parent::__construct();
			$this->load->database();
		}
 
			// Insert json data into database
		public function insert($json_data) {
			$this->db->insert('employee_info', $json_data);
			if ($this->db->affected_rows() > 0) {
			return true;
			} else {
			return false;
			}
		}

		
}
?>