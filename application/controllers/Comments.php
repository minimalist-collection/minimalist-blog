<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comments extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('comments_model');
        $this->load->library('form_validation');
        $this->load->library('recaptcha');
    }

    public function add($post_id)
    {
        if($this->input->method() == 'post')
        {
            $recaptcha = $this->input->post('g-recaptcha-response');
            $response = $this->recaptcha->verifyResponse($recaptcha);
            if(isset($response['success']) && $response['success'] !== TRUE)
            {
                $this->session->set_flashdata('error', 'Please complete the ReCAPTCHA.');
                $this->load->view('comments/error', array('post_id' => $post_id));
                return;
            }

            $this->form_validation->set_rules('name', 'Name', 'required|max_length[50]');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('content', 'Message', 'required|max_length[1000]');

            if($this->form_validation->run() !== FALSE)
            {
                $data = array(
                    'post_id'   => $post_id,
                    'name'      => $this->input->post('name'),
                    'email'     => $this->input->post('email'),
                    'content'   => $this->input->post('content'),
                );
                $this->comments_model->create($data);
                redirect("posts/view/$post_id#comments");
            }
            else
            {
                $this->session->set_flashdata('error', 'There are errors in the comment.');
            }
        }

        $this->load->view('comments/error', array('post_id' => $post_id));
    }

}
