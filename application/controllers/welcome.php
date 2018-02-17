<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Welcome extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -  
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in 
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function __construct() {
        parent::__construct();

        $this->load->model('welcome_model', 'w_model', true);
        $this->load->model('super_admin_model', 'sa_model', true);
    }

    public function index() {
        $data = array();
        $data['slider'] = '1';
        $data['title'] = 'Home';
        $data ['all_portfolio_home'] = $this->sa_model->select_all_home_page_portfolio_info();
        $data['all_category'] = $this->w_model->select_all_published_category();
        $data['all_blog'] = $this->w_model->select_all_published_blog();

        //echo '<pre>';
        //print_r($data);
        //exit();

        $data['maincontent'] = $this->load->view('home_content', $data, TRUE);
        $this->load->view('master', $data);
    }

    public function services() {
        $data = array();
        $data['title'] = 'Services';
        $data['all_category'] = $this->w_model->select_all_published_category();
        $data['maincontent'] = $this->load->view('support_content', '', TRUE);
        $this->load->view('master', $data);
    }

    public function about() {
        $data = array();
        $data['title'] = 'About';
        $data['all_category'] = $this->w_model->select_all_published_category();
        $data['maincontent'] = $this->load->view('about_content', '', TRUE);
        $this->load->view('master', $data);
    }

    public function portfolio() {
        $data = array();
        $data['title'] = 'Portfolio';
        //$data['all_critives'] = $this->sa_model->select_all_critives_info();
        $data ['all_portfolio'] = $this->sa_model->select_all_portfolio_info();
        $data['maincontent'] = $this->load->view('portfolio_content', $data, TRUE);
        $this->load->view('master', $data);
    }

    public function blog() {
        $data = array();
        $data['title'] = 'Blog';
        $data['all_category'] = $this->w_model->select_all_published_category();
        $data['all_blog'] = $this->w_model->select_all_published_blog();
        $data['maincontent'] = $this->load->view('blog_content', $data, TRUE);
        $this->load->view('master', $data);
    }

    public function contact() {
        $data = array();
        $data['title'] = 'Contact';
        $data['all_category'] = $this->w_model->select_all_published_category();
        $data['maincontent'] = $this->load->view('contact_content', '', TRUE);
        $this->load->view('master', $data);
    }

    public function ecommerce_details() {
        $data = array();
        $data['title'] = 'ecommerce';
        $data['maincontent'] = $this->load->view('ecommerce_content', '', TRUE);
        $this->load->view('master', $data);
    }

    public function it_infrastructure() {
        $data = array();
        $data['title'] = 'infrastructure';
        $data['maincontent'] = $this->load->view('it_infrastructure', '', true);
        $this->load->view('master', $data);
    }

    public function graphic_design() {
        $data = array();
        $data['title'] = 'graphic Design';
        $data['maincontent'] = $this->load->view('graphic_design', '', true);
        $this->load->view('master', $data);
    }

    public function web_design() {
        $data = array();
        $data['title'] = 'Web Design';
        $data['maincontent'] = $this->load->view('web_design', '', true);
        $this->load->view('master', $data);
    }

    public function web_development() {
        $data = array();
        $data['title'] = 'Web Development';
        $data['maincontent'] = $this->load->view('web_development', '', true);
        $this->load->view('master', $data);
    }

    public function cms() {
        $data = array();
        $data['title'] = 'cms';
        $data['maincontent'] = $this->load->view('cms', '', true);
        $this->load->view('master', $data);
    }

    public function blog_details($blog_id) {
        $data = array();
        $data['title'] = 'Blog by category';
        $data['all_category'] = $this->w_model->select_all_published_category();
        $data['blog_details'] = $this->w_model->display_blog_details_by_blog_id($blog_id);
        $data['comments_by_blog_id'] = $this->w_model->display_comments_by_blog_id($blog_id);
        $data['maincontent'] = $this->load->view('blog_details', $data, TRUE);
        $this->load->view('master', $data);
    }

    public function category_blog($category_id) {
        $data = array();
        $data['title'] = "Category Blog";
        
        $data['all_category'] = $this->w_model->select_all_published_category();
        $data['all_blog'] = $this->w_model->select_blog_by_category_id($category_id);
        $data['maincontent'] = $this->load->view('blog_content', $data, TRUE);
        $this->load->view('master', $data);
    }

    public function register() {
        $data = array();
        $data['title'] = "Category Blog";
        //$data['all_category'] = $this->w_model->select_all_published_category();        	
        $data['maincontent'] = $this->load->view('register', '', TRUE);
        $this->load->view('master', $data);
    }

}
