<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User_controller extends MY_controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->helper("url");
        $this->load->helper('string');    
    }
    
    //index page
    public function index() {
        $data['templete'] = "Home";
        $data['metadata'] = "Home";
        $this->user_layout($data);
    }
    
    //upload page
    public function upload() {
        $data['templete'] = "Upload";
        $data['metadata'] = "Upload";
        $this->user_layout($data);
    }
    
    
    public function AUploadS() {
        $post = $this->angular_Post(); //after submitting form, getting data from angularjs by post method
        
        $result=$this->User_model->MUploadS($post); //sending post to model and returning data from database
        if ($result) {
            echo json_encode(array('status' => true));
        } else {
            echo json_encode(array('status' => false));
        }
    }
    
    public function AGetimages() {
        echo json_encode($this->User_model->MGetimages()); //getting data from model
    }
 
}
