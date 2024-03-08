<?php

class User_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }

    function add($option) {
        $this->db->set('email', $option['email']);
        $this->db->set('password', $option['password']);
        $this->db->set('created', 'NOW()', false);
        $this->db->insert('user');
        $result = $this->db->insert_id();
        return $result;
    }

    function get($option) {
        //var_dump($option);
        $result = $this->db->get_where('user', array('email' => $option['email']))->row();
        //var_dump($this->db->last_query());
        return $result;
    }
}