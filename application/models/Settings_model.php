<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function update($data)
    {
        $this->db->where('setting_id', 1);
        $this->db->update('settings', $data);
    }

    public function get($key)
    {
        $result = $this->db->get('settings')->first_row();
        return $result->{$key};
    }

    public function get_settings()
    {
        $result = $this->db->get('settings')->first_row();
        return $result;
    }
}