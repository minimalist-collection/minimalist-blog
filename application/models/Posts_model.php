<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posts_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function create($data)
    {
        $this->db->insert('posts', $data);
    }
}