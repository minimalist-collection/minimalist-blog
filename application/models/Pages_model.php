<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function get_pages()
    {
        $result = $this->db->get('pages')->result();
        return $result;
    }

    public function get_page($page_id)
    {
        $this->db->where('page_id', $page_id);
        $result = $this->db->get('pages')->first_row();
        return $result;
    }

    public function set_page($page_id, $data)
    {
        $this->db->where('page_id', $page_id);
        $result = $this->db->update('pages', $data);
        return;
    }

    public function create($data)
    {
        $this->db->insert('pages', $data);
        $page_id = $this->db->insert_id();
        return $page_id;
    }

    public function delete($page_id)
    {
        $this->db->where('page_id', $page_id);
        $this->db->delete('pages');
    }

    public function get_sidebar_pages()
    {
        $this->db->where('sidebar', 'Y');
        $this->db->order_by('sidebar_place');
        $result = $this->db->get('pages')->result();
        return $result;
    }
}