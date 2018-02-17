<?php

class Welcome_Model extends CI_Model {

    //put your code here select_all_published_category()
    public function select_all_published_category() {
        $this->db->select('*');
        $this->db->from('tbl_category');
        $this->db->where('publication_status',1);
        $query_result = $this->db->get();
        $result =$query_result->result();
        return $result;
    }
    public function category_blog($category_id)
    {
    	$data = array();
    	$data['title'] = "Category Product";
    	$data['all_category'] = $this->w_model->select_all_published_category();
    	$data['all_blog'] = $this->w_model->select_blog_by_category_id($category_id);
    	$data['maincontent'] = $this->load->view('product_category', $data, true);
    	$this->load->view('master', $data);
    }
    public function select_all_published_blog() {
        $this->db->select('*');
        $this->db->from('tbl_blog');
        $this->db->where('publication_status',1);
        $this->db->order_by("blog_id", "desc");
        $query_result = $this->db->get();
        $result =$query_result->result();
        return $result;
    }
    public function select_blog_by_category_id($category_id)
    {
    	$this->db->select('*');
    	$this->db->from('tbl_blog');
    	$this->db->where('category_id', $category_id);
    	$this->db->where('publication_status', 1);
         $this->db->order_by("blog_id", "desc");
    	$query_result = $this->db->get();
    	$result = $query_result->result();
    	return $result;
    }
    public function display_blog_details_by_blog_id($blog_id)
    {
    	$this->db->select('*');
    	$this->db->from('tbl_blog');
    	$this->db->where('blog_id', $blog_id);
    	$query_result = $this->db->get();
    	$result = $query_result->row();
    	return $result;
    	
    }
     public function display_comments_by_blog_id($blog_id) {
    
    	$sql="SELECT b.blogger_name,c.comments FROM tbl_blogger as b,tbl_comments as c
    	WHERE c.blogger_id=b.blogger_id AND c.blog_id='$blog_id'";
    
    	$query_result = $this->db->query($sql);
    	$result = $query_result->result();
    	return $result;
    }

}

?>
