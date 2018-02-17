<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
session_start();

class Viewer_manager extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('viewer_model', 'v_model', true);
        $this->load->model('welcome_model', 'w_model', true);
        $this->load->model('super_admin_model', 'sa_model', true);

        $blogger_id = $this->session->userdata('blogger_id');
        if ($blogger_id == NULL) {
            redirect('viewer_login', 'refresh');
        }
    }

    public function index() {
        $data = array();
        $data['title'] = "Home";
        $data['sponsors'] = 1;
        $data['all_blog'] = $this->sa_model->select_all_blog();
        $data['all_category'] = $this->w_model->select_all_published_category();
        $data['maincontent'] = $this->load->view('home_content', $data, true);
        $this->load->view('master', $data);
    }

    public function post_comments() {
        $data = array();
        $data['blog_id'] = $this->input->post('blog_id', true);
        $data['blogger_id'] = $this->input->post('blogger_id', true);
        $data['comments'] = $this->input->post('comments', true);
        $this->v_model->save_comments($data);
        redirect('welcome/blog_details/'.$data['blog_id']);
    }

    public function log_out() {

        $this->session->unset_userdata('blogger_id');
        $this->session->unset_userdata('blogger_fullname');
        $ldata = array();
        $ldata['loged_out'] = "<b><u>You are successfully loged out.</u></b>";
        $this->session->set_userdata($ldata);
        redirect("welcome/blog");
    }

}

?>
