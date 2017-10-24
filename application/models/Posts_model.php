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

    public function get($post_id)
    {
        $result = $this->db->get_where('posts', array('post_id' => $post_id))->first_row();
        if($result)
        {
            $author = $this->ion_auth->user($result->author)->row();
            $result->author = $author;
        }
        return $result;
    }
}