<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('pages_model');
        $this->load->library('form_validation');
    }

    public function create()
    {
        if (!$this->ion_auth->logged_in())
        {
            redirect('auth/login');
        }

        if($this->input->method() == 'post')
        {
            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('content', 'Content', 'required');

            if($this->form_validation->run() !== FALSE)
            {
                $sidebar = $this->input->post('sidebar') == 'on' ? 'Y' : 'N';

                $data = array(
                    'title'     => $this->input->post('title'),
                    'content'   => $this->input->post('content'),
                    'sidebar'    => $sidebar,
                    'sidebar_place' => count($this->pages_model->get_sidebar_pages()) + 1
                );
                $page_id = $this->pages_model->create($data);
                redirect("pages/view/$page_id");
            }
            else
            {
                $this->session->set_flashdata('error', 'There are errors in the page form.');
            }
        }
        $this->load->view('pages/create');
    }

    public function view($page_id)
    {
        $page = $this->pages_model->get_page($page_id);
        $this->load->view('pages/view', array('page' => $page));
    }

    public function edit($page_id)
    {
        if (!$this->ion_auth->logged_in())
        {
            redirect('auth/login');
        }

        if($this->input->method() == 'post')
        {
            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('content', 'Content', 'required');

            if($this->form_validation->run() !== FALSE)
            {
                $sidebar = $this->input->post('sidebar') == 'on' ? 'Y' : 'N';

                $data = array(
                    'title'     => $this->input->post('title'),
                    'content'   => $this->input->post('content'),
                    'sidebar'    => $sidebar,
                    'sidebar_place' => $this->input->post('sidebar_place')
                );
                $this->pages_model->set_page($page_id, $data);
                redirect("pages/view/$page_id");
            }
            else
            {
                $this->session->set_flashdata('error', 'There are errors in the page form.');
            }
        }
        $page = $this->pages_model->get_page($page_id);
        $this->load->view('pages/edit', array('page' => $page));
    }

    public function all()
    {
        $pages = $this->pages_model->get_pages();
        $this->load->view('pages/all', array('pages' => $pages));
    }

    public function delete($page_id)
    {
        if($this->input->method() == 'post')
        {
            $this->pages_model->delete($page_id);
            redirect('posts/all');
        }
    }

}
