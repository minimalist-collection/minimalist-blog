<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posts_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function create($data)
    {
        $tags = $data['tags'];
        unset($data['tags']);
        $this->db->insert('posts', $data);
        $post_id = $this->db->insert_id();
        $this->set_tags($post_id, $tags);
    }

    public function set_tags($post_id, $tags)
    {
        $this->db->delete('tags', array('post_id' => $post_id));
        foreach ($tags as $tag) {
            $tag = trim($tag);
            $tag = str_replace(' ', '-', $tag);
            $tag = preg_replace('/[^A-Za-z0-9\-]/', '', $tag);
            $data = array(
                'post_id' => $post_id,
                'label' => $tag
            );
            $query = $this->db->get_where('tags', $data);
            if(!$query->num_rows())
            {
                $this->db->insert('tags', $data);
            }            
        }
    }

    public function update($post_id, $data)
    {
        $tags = $data['tags'];
        unset($data['tags']);
        $this->db->where('post_id', $post_id);
        $this->db->update('posts', $data);
        $this->set_tags($post_id, $tags);
    }

    public function get_post($post_id)
    {
        $this->db->select('posts.*, GROUP_CONCAT(tags.label) AS tags');
        $this->db->join('tags', 'posts.post_id = tags.post_id', 'left');
        $this->db->where('posts.post_id', $post_id);
        $result = $this->db->get('posts')->first_row();
        if($result)
        {
            $author = $this->ion_auth->user($result->author)->row();
            $result->author = $author;
        }
        return $result;
    }

    public function get_posts()
    {
        $this->db->order_by('publish_date', 'DESC');
        $this->db->order_by('post_id', 'DESC');
        $results = $this->db->get('posts')->result();
        foreach ($results as $key => $result) {
            $author = $this->ion_auth->user($result->author)->row();
            $results[$key]->author = $author;
        }
        return $results;
    }
}