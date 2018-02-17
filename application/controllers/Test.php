<?php
     
        class Test extends CI_Controller {
         
               public function __construct()
               {
                parent::__construct();
                    //$this->load->library('database');
                    $this->load->helper(array('url'));
                     //   $this->load->model('test_model');
              }
             public function index()
              {
                //echo "hello";die;
                $this->db->select('*');
                $this->db->from('ml_subdomains');
                $query = $this->db->get();
                $data['result'] = $query->result();
                $this->load->view('admin/testView',$data);
                 
              }
            public function deleteDomain($id)
              {
                //echo $id;die;
                $this->db->where('id',$id);
                $this->db->delete('ml_subdomains');
                die;
                 
              }    
            public function updateDomain($id)
            {  
                    $data = array('subdomain_name'=>$this->input->post('domain_name'),
                    'user_name'=>$this->input->post('user_name'),
                    'email'=>$this->input->post('email'),
                    'contact_no'=>$this->input->post('contact_no'),
                    'price'=>$this->input->post('price'),
                    );
                    //echo "<pre>";
                    //print_r($data);die;
                    $this->db->where('id',$id);
                    $this->db->update('ml_subdomains',$data);
                    $this->db->select('*');
                    $this->db->where('id',$id);
                    $this->db->from('ml_subdomains');
                    $query = $this->db->get();
                    $result = $query->result();
                    //print_r($result );
                    //echo $result[0]->id;die;
                    echo $html = "<tr id='domain".$id."'>                  
                    <td style='width:360px'>".$result[0]->user_name."</td>
                    <td style='width:360px'>".$result[0]->contact_no."</td>
                    <td style='width:360px'>".$result[0]->email."</td>
                    <td style='width:360px'>".$result[0]->price."</td>
                    <td style='width:360px'>                   
                    <a href='javascript:void(0)' title='Edit' onclick='editDomain(".$id.")' class='icon-1 info-tooltip'>Edit</a>
                    <a href='javascript:void(0)' onclick='deleteDomain(".$id.")'  title='Delete' class='icon-2 info-tooltip'>Delete</a>
                <a href='javascript:void(0) class='hide' id='".$id."'></a>                 
                </td>              
                </tr>";    
        }
    public function editDomain($id)
      {    
            $this->db->select('*');
            $this->db->from('ml_subdomains');
            $this->db->where('id',$id);
            $query = $this->db->get();
            $result = $query->result();
            //print_r($result );die;
            echo $html = '
            <td colspan="10" class="updatedData'.$id.'">
            <form method="POST" role="form" id="myForm'.$result[0]->id.'">     
            <input type="text" name="user_name" class="inp-form" value="'.$result[0]->user_name.'">
            <input type="text" name="contact_no" class="inp-form" value="'.$result[0]->contact_no.'">
            <input type="text" name="email" class="inp-form" value="'.$result[0]->email.'">
            <input type="text" name="price" class="inp-form" value="'.$result[0]->price.'">                
            <input type="button" value="Update" onclick="updateDomain('.$result[0]->id.')" class="form-submit" />                  
            <a href=""   title="Cancel" >Cancel</a>
            <a href="javascript:void(0)" class="hide" id="hide'.$result[0]->id.'">Please wait...</a>           
</form>
    </td>
                ';
        die;
         
      }
}
 