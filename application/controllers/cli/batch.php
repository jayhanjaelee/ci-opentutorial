<?php
class Batch extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }

    function process() {
        echo 'process() called;';
    //     $this->load->model('user_model');
    //     $this->load->library('email');
    //     $users = $this->user_model->gets();
    //     $this->email->initialize(array('mailtype'=>'html'));
    //     foreach ($users as $user) {
    //         $this->email->from('jayhanjaelee@gmail.com', 'nickname');
    //         $this->email->to($user->email);
    //         $this->email->subject('test');
    //         $this->email->message('test');
    //         $this->email->send();
    //     }
    }
}
?>