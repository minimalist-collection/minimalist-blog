<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('posts_model');
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

            // Get user ID of current user
            $author = $this->ion_auth->user()->row();
            $author = $author->id;

            // Get current date time
            $publish_date = date("Y-m-d H:i:s");

            // Put it all together
            $data = array(
                'title'     => $this->input->post('title'),
                'content'   => $this->input->post('content'),
                'author'    => $author,
                'publish_date' => $publish_date
            );

            if($this->form_validation->run() !== FALSE)
            {
                // Create the post
                $this->posts_model->create($data);
            }
            else
            {
                $this->session->set_flashdata('error', 'There are errors in the post.');
            }
        }

        $this->load->view('posts/create');
    }

    public function edit($post_id)
    {
        if (!$this->ion_auth->logged_in())
        {
            redirect('auth/login');
        }

        $post = $this->posts_model->get_post($post_id);

        if($this->input->method() == 'post')
        {
            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('content', 'Content', 'required');

            if($this->form_validation->run() !== FALSE)
            {
                $data = array(
                    'title'     => $this->input->post('title'),
                    'content'   => $this->input->post('content')
                );

                // Update the post
                $this->posts_model->update($post_id, $data);
                redirect("posts/view/$post_id");
            }
            else
            {
                $this->session->set_flashdata('error', 'There are errors in the post.');
            }
        }

        $this->load->view('posts/edit', array('post' => $post));
    }

    public function view($post_id)
    {
        $post = $this->posts_model->get_post($post_id);
        $this->load->view('posts/view', array('post' => $post));
    }

    public function all()
    {
        $this->load->helper('pagination');
        $posts = $this->posts_model->get_posts();
        $pagination = paginate($posts);
        $this->load->view('posts/all', array('posts' => $posts, 'pagination' => $pagination));
    }

}
