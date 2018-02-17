<?php

class Viewer_model extends CI_Model {

    public function select_viewer($email_address, $password) {
        $this->db->select('*');
        $this->db->from('tbl_blogger');
        $this->db->where('blogger_email_address', $email_address);
        $this->db->where('blogger_password', md5($password));
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

    public function save_viewer_info($data) {
        $this->db->insert('tbl_blogger', $data);
    }
    public function save_comments($data) {
        $this->db->insert('tbl_comments', $data);
    }

}

?>
