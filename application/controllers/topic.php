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

        $this->load->view('topics', array('topics' => $topics));

        $this->_footer();
    }

    function get($id) {
        $this->title = 'Topic page';
        $this->_head($this->title);
        $topics = $this->topic_model->gets();
        $this->load->view('topics', array('topics' => $topics));
        $topic = $this->topic_model->get($id);
        $this->load->helper(array('url', 'HTML', 'korean'));
        $this->load->view('topic', array('topic' => $topic));
        $this->_footer();
    }

    public function add() {
        // 로그인 되어있지 않으면 로그인 페이지로 리다이렉션
        if (!$this->session->userdata('is_login')) {
            $this->load->helper('url');
            redirect($this->config->base_url() . 'auth/login?returnURL=' . rawurlencode(site_url('/topic/add')));
        }

        // load library
        $this->load->library('form_validation');

        $this->form_validation->set_rules('title', '제목', 'required');
        if ($this->form_validation->run() == FALSE) {
            $title = 'Topic Add Page';
            $topics = $this->topic_model->gets();
            $this->_head($title);
            $this->load->view('topics', array('topics', 'topics' => $topics));
            $this->load->view('add');
        } else {
            $topic_id = $this->topic_model->add(
                $this->input->post('title'),
                $this->input->post('description'),
            );

            // $this->_send_email();
            // $this->load->helper('url');

            redirect($this->config->base_url() . 'topic/' . $topic_id);
            // Batch Queue에 notify_email_add_topic 추가
            $this->load->model('batch_model');
            $this->batch_model->add(array('job_name' => 'notify_email_add_topic', 'context'=>json_encode(array('topic_id'=>$topic_id))));
        }

        $this->_footer();
    }

    function upload_recevie() {
        // 사용자가 업로드 한 파일을 /static/files/ 디렉토리에 저장한다.
        $config['upload_path'] = './static/files';
        // git,jpg,png 파일만 업로드를 허용한다.
        $config['allowed_types'] = 'gif|jpg|png';
        // 허용되는 파일의 최대 사이즈
        $config['max_size'] = '100';
        // 이미지인 경우 허용되는 최대 폭
        $config['max_width']  = '1024';
        // 이미지인 경우 허용되는 최대 높이
        $config['max_height']  = '768';
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload("user_upload_file")) {
            echo $this->upload->display_errors();
        } else {
            $data = array('upload_data' => $this->upload->data());
            echo '성공';
            var_dump($data);
        }
    }

    public function upload_form() {
        $title = 'upload form';
        $this->_head($title);
        $this->load->view('upload_form');
        $this->_footer();
    }

    private function _send_email() {
        $this->load->model('user_model');
        $this->load->library('email');
        $this->email->initialize(array('mailtype' => 'html'));
        $users = $this->user_model->gets();
        foreach ($users as $user) {
            $this->email->from('jayhanjaelee@gmail.com', 'hanjaelee');
            $this->email->to($user->email);
            $this->email->subject('새로운 글이 등록되었습니다.');
            $this->email->message('<a href="' . site_url('/topic/get/' . $topic_id) . '">' . $this->input->post('title') . '</a>');
            $this->email->send();
        }
    }
}
