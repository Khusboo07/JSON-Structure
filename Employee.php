<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Employee extends CI_Controller {
 
	public function __construct() {
        parent::__construct();
        $this->load->model("Employee_Model");
        $this->load->helper('url','form');
        $this->load->helper('file');
    }

    // Load view page
    public function index() {

        $this->load->view("register");
    }

    // Fetch user data and convert data into json
    public function data_submitted() {

        // Store user submitted data in array
        $data = array(
        'employee_name' => $this->input->post('emp_name'),
        'employee_email' => $this->input->post('emp_email'),
        'employee_password' => $this->input->post('emp_password'),
        'employee_mobile' => $this->input->post('emp_mobile'),
        );

        // Converting $data in json
        $json_data['emp_data'] = json_encode($data);

        // Send json encoded data to model
        $return = $this->Employee_Model->insert($json_data);
        if ($return == true) {
        $data['result_msg'] = 'Data successfully inserted into database !';
        } else {
        $data['result_msg'] = 'Please configure your database correctly';
        }

        // Load view to show message
        $this->load->view("register", $data);
    }

    // This function call from AJAX
    public function user_data_submit() {
        $result = array(
        'employee_name' => $this->input->post('emp_name'),
        'employee_email' => $this->input->post('emp_email'),
        'employee_password' => $this->input->post('emp_password'),
        'employee_mobile' => $this->input->post('emp_mobile'),
        );

        //Either you can print value or you can send value to database
        echo json_encode($result);
        
    }


    public function display(){
        $this->load->view("display_records");
    }


}

?>