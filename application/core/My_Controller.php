<?php

class My_Controller extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->database();
        if(!$this->input->is_cli_request())
            $this->load->library('session');
    }

    public function _head($title) {
        $this->load->view('/template/header', array('title'=>$title));
        $this->load->view('/template/nav');
    }

    public function _footer() {
        $this->load->view('/template/footer');
    }
}