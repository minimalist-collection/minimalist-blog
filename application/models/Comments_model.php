<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comments_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function create($data)
    {
        $this->db->insert('comments', $data);
    }

    public function get_comments($post_id)
    {
        $this->db->order_by('date', 'DESC');
        $this->db->where('post_id', $post_id);
        return $this->db->get('comments')->result();
    }
}