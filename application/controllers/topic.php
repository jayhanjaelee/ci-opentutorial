<?php

class Topic extends My_Controller {
    public $title = '';

    public function __construct() {
        parent::__construct();
        $this->load->model('topic_model');
    }

    public function index() {
        $this->gets();
    }

    public function gets() {
        $this->title = 'Topics page';
        $this->_head($this->title);
        $topics = $this->topic_model->gets();

        $this->load->view('topics', array('topics'=>$topics));

        $this->_footer();
    }

    function get($id) {
        $this->title = 'Topic page';
        $this->_head($this->title);
        $topics = $this->topic_model->gets();
        $this->load->view('topics', array('topics' => $topics));
        $topic = $this->topic_model->get($id);
        $this->load->view('topic', array('topic' => $topic));
        $this->_footer();
    }

    public function add() {
        // 로그인 되어있지 않으면 로그인 페이지로 리다이렉션
        if (!$this->session->userdata('is_login')) {
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