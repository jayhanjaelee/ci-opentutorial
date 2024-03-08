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
        $this->load->view('main');
        $this->_footer();
    }
}