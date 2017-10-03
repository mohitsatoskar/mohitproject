<?php

class MY_controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        define('BASEURL', base_url());
        define('SITEURL', site_url());
        $this->load->library('session');
    }

    public function user_layout($data) {
        $temp['data'] = $data;
        $temp['page'] = $data['templete'];
        $this->load->view('user/layout/index', $temp);
    }

    public function get_angular() {
        return json_decode(file_get_contents("php://input"), true);
    }

    public function angular_Post() {
        return json_decode(file_get_contents("php://input"), true);
    }

}
