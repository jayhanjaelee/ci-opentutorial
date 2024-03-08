<?php

class Topic extends My_Controller {
    public function __construct() {
        parent::__construct();
    }

    public function index() {
        echo '<h1>topic page</h1><br>';
    }

    public function add() {
        // 로그인 되어있지 않으면 로그인 페이지로 리다이렉션
        if(!$this->session->userdata('is_login')) {
            $this->load->helper('url');
            redirect('/auth/login');
        }

        $this->load->library('form_validation');

        $title = 'Topic Add Page';
        $this->_head($title);

        $this->load->view('add');

        $this->_footer();
    }
}