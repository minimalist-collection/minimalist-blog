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
        return $post_id;
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

    public function search($keywords)
    {
        $this->db->select('posts.*, GROUP_CONCAT(tags.label) AS tags');
        $this->db->group_by('post_id');
        $this->db->join('tags', 'posts.post_id = tags.post_id', 'left');
        $this->db->where('posts.publish_date IS NOT NULL');
        $this->db->where("MATCH (posts.content) AGAINST ('+" . $keywords . "' IN BOOLEAN MODE)", null, false);
        $this->db->order_by('publish_date', 'DESC');
        $this->db->order_by('post_id', 'DESC');
        $results = $this->db->get('posts')->result();
        foreach ($results as $key => $result) {
            $author = $this->ion_auth->user($result->author)->row();
            $results[$key]->author = $author;
        }
        return $results;
    }

    public function delete($post_id)
    {
        $this->db->where('post_id', $post_id);
        $this->db->delete('posts');
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

    public function get_posts($drafts = false)
    {
        $this->db->select('posts.*, GROUP_CONCAT(tags.label) AS tags');
        $this->db->group_by('post_id');
        $this->db->join('tags', 'posts.post_id = tags.post_id', 'left');
        if(!$drafts)
        {
            $this->db->where('posts.publish_date IS NOT NULL');
        }
        else
        {
            $this->db->order_by('publish_date', 'DESC');
        }
        $this->db->order_by('post_id', 'DESC');
        $results = $this->db->get('posts')->result();
        foreach ($results as $key => $result) {
            $author = $this->ion_auth->user($result->author)->row();
            $results[$key]->author = $author;
        }
        return $results;
    }

    public function get_posts_archive()
    {
        $this->db->select('posts.post_id, posts.title, posts.publish_date');
        $this->db->where('posts.publish_date IS NOT NULL');
        $this->db->order_by('publish_date', 'DESC');
        $results = $this->db->get('posts')->result();
        return $results;
    }

    public function get_by_tag($tag)
    {
        $this->db->select('posts.*, GROUP_CONCAT(tags.label) AS tags');
        $this->db->order_by('publish_date', 'DESC');
        $this->db->order_by('post_id', 'DESC');
        $this->db->group_by('post_id');
        $this->db->where('tags.label', $tag);
        $this->db->join('tags', 'posts.post_id = tags.post_id', 'left');
        $results = $this->db->get('posts')->result();
        foreach ($results as $key => $result) {
            $author = $this->ion_auth->user($result->author)->row();
            $results[$key]->author = $author;
        }
        return $results;
    }
}