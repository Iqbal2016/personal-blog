<?php
class Portfolio extends CI_Controller{
	
	public function index(){
		$data=array();
		$data['maincontent']=$this->load->view('home_content',$data, TRUE);
		$this->load->view('master',$data);
		
	}
	
}