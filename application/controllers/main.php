<?php
class Main extends My_Controller
{
    public $title = '';

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->title = "Main Page";
        $this->_head($this->title);
        $this->load->model('topic_model');
        $topics = $this->topic_model->gets();
        $this->load->view('topics', array('topics'=>$topics));
        $topic = $this->topic_model->get(1);
        $this->load->helper(array('url', 'HTML', 'korean'));
        $this->load->view('topic', array('topic'=>$topic));
        // $this->load->view('main');
        $this->_footer();
    }
}