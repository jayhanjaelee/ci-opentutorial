<?php

class Auth extends My_Controller {
    public $title = '';

    public function __construct() {
        parent::__construct();
    }

    public function index() {
    }

    public function register() {
        $this->title = 'Register Page';
        $this->_head($this->title);

        $this->load->library('form_validation');

        $this->form_validation->set_rules('email', '이메일', 'required|valid_email|is_unique[user.email]');

        $this->form_validation->set_rules('nickname', '닉네임', 'required|min_length[5]|max_length[20]');
        $this->form_validation->set_rules('password', '비밀번호', 'required|min_length[4]|max_length[30]|matches[re_password]');
        $this->form_validation->set_rules('re_password', '패스워드 확인', 'required');

        if ($this->form_validation->run() === false) {
            $this->load->view('register');
        } else {
            // insert userdata
            if (!function_exists('password_hash')) {
                $this->load->helper('password');
            }
            $hash = password_hash($this->input->post('password'), PASSWORD_BCRYPT, ['cost' => 12]);

            $this->load->model('user_model');
            $this->user_model->add(array(
                'email' => $this->input->post('email'),
                'password' => $hash,
                'nickname' => $this->input->post('nickname'),
            ));

            $this->session->set_flashdata('message', '회원가입에 성공했습니다.');
            $this->load->helper('url');
            redirect($this->config->item('base_url'));
        }

        $this->_footer();
    }

    public function login() {
        $this->title = 'Login Page';
        $this->_head($this->title);

        $this->load->view('login', array('returnURL' => $this->input->get('returnURL')));
        http://localhost/ci-opentutorial/index.php/index.php/ci-opentutorial/index.php/auth/authentication?returnURL=http%3A%2F%2Flocalhost%2Fci-opentutorial%2Findex.php%2Findex.php%2Ftopic%2Fadd

        $this->_footer();
    }

    public function logout() {
        $this->session->unset_userdata('is_login');

        $this->load->helper('url');
        redirect($this->config->item('base_url') . '/auth/login');
    }

    public function authentication() {
        $this->load->helper('form');
        $this->load->model('user_model');
        $user = $this->user_model->get(array(
            'email' => $this->input->post('email')
        ));

        if (
            // db 에서 데이터 가져오게 변경
            $this->input->post('email') == $user->email &&
            password_verify($this->input->post('password'), $user->password)
        ) {
            $this->session->set_flashdata('message', '로그인에 성공했습니다');
            $this->session->set_userdata('is_login', true);
            $this->load->helper('url');
            $returnURL = $this->input->get('returnURL');
            if ($returnURL === false) {
                $returnURL = '/';
            }
            redirect($returnURL);
            //redirect($this->config->item('base_url'));
        } else {
            $this->session->set_flashdata('message', '로그인에 실패 했습니다.');
            $this->load->helper('url');
            redirect($this->config->item('base_url') . '/auth/login');
        }
    }
}
