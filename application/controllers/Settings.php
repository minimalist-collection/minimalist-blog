<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('settings_model');
        $this->load->library('form_validation');
    }

    public function update()
    {
        if (!$this->ion_auth->logged_in())
        {
            redirect('auth/login');
        }

        if($this->input->method() == 'post')
        {
            $this->form_validation->set_rules('title', 'Title', 'required|max_length[50]');
            $this->form_validation->set_rules('description', 'Description', 'required');
            $this->form_validation->set_rules('comments', 'Comments', 'required');

            if($this->form_validation->run() !== FALSE)
            {
                $data = array(
                    'title'         => $this->input->post('title'),
                    'description'   => $this->input->post('description'),
                    'comments'      => $this->input->post('comments'),
                );
                $this->settings_model->update($data);
                $this->session->set_flashdata('success', 'Settings have been updated');
            }
            else
            {
                $this->session->set_flashdata('error', 'There are errors in the form.');
            }
        }

        $settings = $this->settings_model->get_settings();
        $this->load->view('settings/update', array('settings' => $settings));
    }
}
