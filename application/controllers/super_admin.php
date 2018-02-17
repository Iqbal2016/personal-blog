<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

session_start();

class Super_Admin extends CI_Controller {

    // put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model('super_admin_model', 'sa_model', true);
        $this->load->model('welcome_model', 'w_model', TRUE);
        $admin_id = $this->session->userdata('admin_id');
        // echo '-----'.$admin_id;
        if ($admin_id == null) {
            redirect('admin_login', 'refresh');
        }
    }

    public function index() {
        $data = array();
        $data ['adminmaincontent'] = $this->load->view('admin/admin_home_content', '', TRUE);
        $this->load->view('admin/admin_master', $data);
    }

    public function category_form() {
        $data = array();
        $data ['adminmaincontent'] = $this->load->view('admin/add_category_form', '', TRUE);
        $this->load->view('admin/admin_master', $data);
    }

    public function save_category() {
        $data = array();
        $data ['category_name'] = $this->input->post('category_name', true);
        $data ['category_description'] = $this->input->post('category_description', true);
        $data ['publication_status'] = $this->input->post('publication_status', true);
        $this->sa_model->save_category_info($data);
        $sdata = array();
        $sdata ['message'] = 'Save Category Successfully !';
        $this->session->set_userdata($sdata);
        redirect('super_admin/category_form');
    }

    public function all_category() {
        $data = array();
        // ---------------------------
        $this->load->library('pagination');
        $config ['base_url'] = base_url() . 'super_admin/all_category/';
        $config ['total_rows'] = $this->db->count_all('tbl_category');
        $config ['per_page'] = '8';
        $config ['full_tag_open'] = '<p>';
        $config ['full_tag_close'] = '</p>';
        $this->pagination->initialize($config);
        // -------------------------
        $data ['all_category'] = $this->sa_model->select_all_category_info($config ['per_page'], $this->uri->segment(3));
        $data ['adminmaincontent'] = $this->load->view('admin/category_gride', $data, TRUE);
        $this->load->view('admin/admin_master', $data);
    }

    public function delete_category($category_id) {
        $this->sa_model->delete_category_info_by_category_id($category_id);
        redirect('super_admin/all_category');
    }

    public function edit_category($category_id) {
        $data = array();
        $data ['category_info'] = $this->sa_model->select_category_info_by_category_id($category_id);
        $data ['adminmaincontent'] = $this->load->view('admin/edite_category_form', $data, TRUE);
        $this->load->view('admin/admin_master', $data);
    }

    public function update_category() {
        $data = array();
        $category_id = $this->input->post('category_id', true);
        $data ['category_name'] = $this->input->post('category_name', true);
        $data ['category_description'] = $this->input->post('category_description', true);
        $data ['publication_status'] = $this->input->post('publication_status', true);
        $this->sa_model->update_category_info($data, $category_id);
        $sdata = array();
        $sdata ['message'] = 'Update Category Successfully !';
        $this->session->set_userdata($sdata);
        redirect('super_admin/edit_category/' . $category_id);
    }

    public function unpublished_category($category_id) {
        $this->sa_model->unpublished_category_info($category_id);
        redirect("super_admin/all_category");
    }

    public function published_category($category_id) {
        $this->sa_model->published_category_info($category_id);
        redirect("super_admin/all_category");
    }

    public function add_blog() {
        $data = array();
        $data ['all_category'] = $this->w_model->select_all_published_category();
        $data ['adminmaincontent'] = $this->load->view('admin/add_blog_form', $data, TRUE);
        $this->load->view('admin/admin_master', $data);
    }

    public function save_blog() {
        $data = array();

        /* -----------Upload start--------------- */

        $config ['upload_path'] = 'images/blog_images/';
        $config ['allowed_types'] = 'gif|jpg|png';
        $config ['max_size'] = '10000';
        $config ['max_width'] = '1024';
        $config ['max_height'] = '768';
        $error = array();
        $fdata = array();
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('blog_images')) {
            $error = $this->upload->display_errors();
            echo '<pre>';
            print_r($error);
            exit();
        } else {
            $fdata = $this->upload->data();
            // echo '<pre>';
            // print_r($fdata);
            $data ['blog_images'] = base_url() . $config ['upload_path'] . $fdata ['file_name'];
            // echo $data['product_image'];
        }
        /* -----------Upload End--------------- */

        $data ['blog_title'] = $this->input->post('blog_title', true);
        $data ['category_id'] = $this->input->post('category_id', true);
        $data ['blog_short_description'] = $this->input->post('blog_short_description', true);
        $data ['blog_description'] = $this->input->post('blog_description', true);
        $data ['author_name'] = $this->input->post('author_name', true);
        $data ['author_email'] = $this->input->post('author_email', true);
        $data ['publication_status'] = $this->input->post('publication_status', true);
        $this->sa_model->save_blog_info($data);
        $sdata = array();
        $sdata ['message'] = 'Save blog Successfully !';
        $this->session->set_userdata($sdata);
        redirect('super_admin/add_blog');
    }

    public function all_blog() {
        $data = array();
        // $data['all_category'] = $this->sa_model->select_all_category_info();
        $data ['all_blog'] = $this->sa_model->select_all_blog_info();      
        $data ['adminmaincontent'] = $this->load->view('admin/blog_gride', $data, TRUE);
        $this->load->view('admin/admin_master', $data);
    }

    public function delete_blog($blog_id) {
        $this->sa_model->delete_blog_info_by_blog_id($blog_id);
        redirect('super_admin/all_blog');
    }

    public function edit_blog($blog_id) {
        $data = array();
        // $data['all_category'] = $this->sa_model->select_all_category_info();
        $data ['blog_info'] = $this->sa_model->select_blog_info_by_blog_id($blog_id);
        $data ['adminmaincontent'] = $this->load->view('admin/edite_blog_form', $data, TRUE);
        $this->load->view('admin/admin_master', $data);
    }

    public function update_blog() {
        $data = array();
        $blog_id = $this->input->post('blog_id', true);
        $data ['category_id'] = $this->input->post('category_id', true);
        $data ['blog_title'] = $this->input->post('blog_title', true);
        $data ['author_name'] = $this->input->post('author_name', true);
        $data ['author_email'] = $this->input->post('author_email', true);
        $data ['blog_description'] = $this->input->post('blog_description', true);
        $data ['publication_status'] = $this->input->post('publication_status', true);
        $this->sa_model->update_blog_info($data, $blog_id);
        $sdata = array();
        $sdata ['message'] = "Updated Blog Successfully";
        $this->session->set_userdata($sdata);
        redirect('super_admin/edit_blog/' . $blog_id);
    }

    public function unpublished_blog($blog_id) {
        $this->sa_model->unpublished_blog_info($blog_id);
        redirect("super_admin/all_blog");
    }

    public function published_blog($blog_id) {
        $this->sa_model->published_blog_info($blog_id);
        redirect("super_admin/all_blog");
    }

    public function logout() {
        session_destroy();
        $this->session->unset_userdata('admin_id');
        $data = array();
        $data ['message'] = "Are you successfully Logout !";
        $this->session->set_userdata($data);
        redirect('admin_login');
    }

    public function add_admin() {
        $data = array();
        // $data['all_category'] = $this->w_model->select_all_published_category();
        $data ['adminmaincontent'] = $this->load->view('admin/add_admin_form', $data, TRUE);
        $this->load->view('admin/admin_master', $data);
    }

    public function save_admin() {
        $data = array();

        $config ['upload_path'] = 'images/admin_images/';
        $config ['allowed_types'] = 'gif|jpg|png';
        $config ['max_size'] = '10000';
        $config ['max_width'] = '1024';
        $config ['max_height'] = '768';
        $error = array();
        $fdata = array();
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('admin_images')) {
            $error = $this->upload->display_errors();
            echo '<pre>';
            print_r($error);
            exit();
        } else {
            $fdata = $this->upload->data();
            // echo '<pre>';
            // print_r($fdata);
            $data ['admin_images'] = base_url() . $config ['upload_path'] . $fdata ['file_name'];
            // echo $data['product_image'];
        }
        /* -----------Upload End--------------- */
        // exit();

        $data ['first_name'] = $this->input->post('first_name', true);
        $data ['last_name'] = $this->input->post('last_name', true);
        $data ['admin_email_address'] = $this->input->post('admin_email_address', true);
        $data ['admin_password'] = md5($this->input->post('admin_password', TRUE));
        // $data['admin_password'] = md5($this->input->post('admin_password', TRUE)); image
        $data ['phone'] = $this->input->post('phone', TRUE);
        $data ['Address'] = $this->input->post('Address');
        $data ['city'] = $this->input->post('city');
        $data ['country'] = $this->input->post('country');

        $this->sa_model->save_admin_info($data);
        $sdata = array();
        $sdata ['message'] = 'Save Admin Successfully !';
        $this->session->set_userdata($sdata);
        redirect('super_admin/add_admin_form');
    }

    public function all_admin() {
        $data = array();
        $data ['all_admin'] = $this->sa_model->select_all_admin_info();
        $data ['adminmaincontent'] = $this->load->view('admin/admin_gride', $data, TRUE);
        $this->load->view('admin/admin_master', $data);
    }

    public function add_portfolio() {
        $data = array();
        $data ['all_category'] = $this->sa_model->select_all_category_info();
        $data ['adminmaincontent'] = $this->load->view('admin/add_portfolio_form', $data, TRUE);
        $this->load->view('admin/admin_master', $data);
    }

    public function save_portfolio() {
        $data = array();
        $data ['portfolio_title'] = $this->input->post('portfolio_title', true);
        $data ['portfolio_category'] = $this->input->post('portfolio_category', true);
        $data ['portfolio_status'] = $this->input->post('portfolio_status', true);
        $data ['portfolio_description'] = $this->input->post('portfolio_description', true);
        /* -----------Upload Start--------------- */
        $config['upload_path'] = 'images/portfolio_images/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '30000';
        $config['max_width'] = '3024';
        $config['max_height'] = '5768';
        $error = array();
        $fdata = array();
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('portfolio_images')) {
            $error = $this->upload->display_errors();
            //echo '<pre>';
            //print_r($error);
        } else {
            $fdata = $this->upload->data();
            //echo '<pre>';
            //print_r($fdata);
            //exit();
            $data['portfolio_images'] = base_url() . $config['upload_path'] . $fdata['file_name'];
            
        }
        /* -----------Upload End--------------- */

        $this->sa_model->save_portfolio_info($data);
        $sdata = array();
        $sdata ['message'] = 'Save Portfolio Successfully !';
        $this->session->set_userdata($sdata);
        redirect('super_admin/add_portfolio');
    }

    public function all_portfolio() {
        $data = array();
        $data ['all_category'] = $this->sa_model->select_all_category_info();
        $data ['all_portfolio'] = $this->sa_model->select_all_portfolio_info();
        $data ['adminmaincontent'] = $this->load->view('admin/portfolio_gride', $data, TRUE);
        $this->load->view('admin/admin_master', $data);
    }

    public function unpublished_portfolio($portfolio_id) {
        $this->sa_model->unpublished_portfolio_info($portfolio_id);
        redirect("super_admin/all_portfolio");
    }

    public function published_portfolio($portfolio_id) {
        $this->sa_model->published_portfolio_info($portfolio_id);
        redirect("super_admin/all_portfolio");
    }

    public function update_portfolio($portfolio_id) {
        $data = array();
        $data ['all_portfolio'] = $this->sa_model->select_all_portfolio_info();
        $data ['portfolio_info'] = $this->sa_model->select_portfolio_info_by_portfolio_id($portfolio_id);
        $data ['adminmaincontent'] = $this->load->view('admin/edite_portfolio_form', $data, TRUE);
        $this->load->view('admin/admin_master', $data);
    }
    public function delete_portfolio($portfolio_id){
         $this->sa_model->delete_portfolio_info_by_portfolio_id($portfolio_id);
         redirect('super_admin/all_portfolio');
    }

}
