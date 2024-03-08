<?php

class Topic_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }

    public function gets() {
        $sql = 'SELECT * FROM topic;';
        return $this->db->query($sql)->result();
    }

    function get($topic_id){
        return $this->db->get_where('topic', array('id'=>$topic_id))->row();
    }
}