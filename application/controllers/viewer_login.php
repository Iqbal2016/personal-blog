<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
session_start();

class Viewer_login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('viewer_model', 'v_model', true);
        $this->load->model('welcome_model', 'w_model', true);

        $viewer_id = $this->session->userdata('viewer_id');
        if ($viewer_id != NULL) {
            redirect('viewer_manager', 'refresh');
        }
    }

    public function index() {
        $data = array();
        $data['title'] = "Login";
        $data['all_category'] = $this->w_model->select_all_published_category();
        $data['maincontent'] = $this->load->view('viewer_login', '', true);
        $this->load->view('master', $data);
    }
    public function check_login() {
        $email_address = $this->input->post('blogger_email_address', true);
        $password = $this->input->post('blogger_password', true);
			
        $result = $this->v_model->select_viewer($email_address, $password);

        if ($result) {
            $data = array();
            $data['blogger_id'] = $result->blogger_id;
            $data['blogger_name'] = $result->blogger_name;
           
            $this->session->set_userdata($data);
            redirect("welcome/blog");
        } else {
            $sdata = array();
            $sdata['exception'] = "User ID or Password invalid.";
            
            echo '<pre>';
            print_r($sdata);
            exit();
            
            $this->session->set_userdata($sdata);
            redirect("welcome/blog");
        }
    }

}

?>
