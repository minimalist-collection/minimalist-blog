<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Install extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('settings_model');
        $this->load->library('form_validation');
        $this->load->library('recaptcha');
    }

    public function index()
    {
        if($this->input->method() == 'post')
        {
            $this->form_validation->set_rules('title', 'Title', 'required|max_length[50]');
            $this->form_validation->set_rules('description', 'Description', 'required');

            $this->form_validation->set_rules('first_name', 'First name', 'required');
            $this->form_validation->set_rules('last_name', 'Last name', 'required');
            $this->form_validation->set_rules('email', 'Email address', 'required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
            $this->form_validation->set_rules('password2', 'Password confirmation', 'required|matches[password]');

            if($this->form_validation->run() !== FALSE)
            {
                $settings = array(
                    'setting_id' => 1,
                    'title' => $this->input->post('title'),
                    'description' => $this->input->post('description'),
                    'comments' => 'Y'
                );
                $this->settings_model->install_settings($settings);

                $username = $this->input->post('email');
                $password = $this->input->post('password');
                $email = $this->input->post('email');
                $additional_data = array(
                    'first_name' => $this->input->post('first_name'),
                    'last_name' => $this->input->post('last_name')
                );
                $group = array('1');

                $this->ion_auth->register($username, $password, $email, $additional_data, $group);
                $this->ion_auth->login($username, $password, TRUE);

                $this->session->set_flashdata('success', 'Congratulations! Blog has been installed. Make your first post!');
                redirect("posts/create");
            }
            else
            {
                $this->session->set_flashdata('error', 'There are errors in the form.');
            }
        }
        $this->load->view('install/install');
    }
}
