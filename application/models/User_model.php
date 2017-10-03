<?php

class User_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set("Canada/Central");        
        $this->load->helper('string');
        $this->load->database();
    }

    //inserting data to database
    public function MUploadS($post){
        $post['recDate'] = date('Y-m-d h:i:s');
        return $this->db->insert('tbgallery', $post);
    }
    
    //getting data from database
    public function MGetimages() {
        $result = $this->db->select('*')
                        ->from('tbgallery')
                        ->get()->result();
        return $result;
    }
    
}
