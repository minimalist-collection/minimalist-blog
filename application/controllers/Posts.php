<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('posts_model');
        $this->load->model('comments_model');
        $this->load->library('form_validation');
        $this->load->library('recaptcha');
        $this->load->helper('pagination');
        $this->load->helper('html');
        $this->load->helper('post');
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

            // Set publish date
            if( $this->input->post('draft') )
            {
                $publish_date = null;
            }
            else
            {
                $publish_date = date("Y-m-d H:i:s");
            }            

            // Put it all together
            $data = array(
                'title'     => $this->input->post('title'),
                'content'   => $this->input->post('content'),
                'author'    => $author,
                'publish_date' => $publish_date,
                'tags'      => explode( ',', $this->input->post('tags'))
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

    public function delete($post_id)
    {
        if($this->input->method() == 'post')
        {
            $this->posts_model->delete($post_id);
            redirect('posts/all');
        }
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
            if( $this->input->post('delete') )
            {
                $this->posts_model->delete($post_id);
                redirect('posts/all');
            }

            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('content', 'Content', 'required');

            if($this->form_validation->run() !== FALSE)
            {
                $data = array(
                    'title'     => $this->input->post('title'),
                    'content'   => $this->input->post('content'),
                    'tags'      => explode( ',', $this->input->post('tags'))
                );

                if( $this->input->post('draft') )
                {
                    $data['publish_date'] = null;
                }
                else
                {
                    $data['publish_date'] = $post->publish_date ? $post->publish_date : date("Y-m-d H:i:s");
                }

                // Update the post
                $this->posts_model->update($post_id, $data);
                redirect("posts/view/$post_id");
            }
            else
            {
                $this->session->set_flashdata('error', 'There are errors in the post.');
            }
        }

        $post->tags = str_replace('-', ' ', $post->tags);
        $post->tags = str_replace(',', ', ', $post->tags);
        $this->load->view('posts/edit', array('post' => $post));
    }

    public function view($post_id)
    {
        $post = $this->posts_model->get_post($post_id);
        if(!$post->publish_date && !$this->ion_auth->logged_in())
        {
            $post = null;
            $comments = null;
        }
        else
        {
            $comments = $this->comments_model->get_comments($post_id);
        }
        
        $this->load->view('posts/view', array('post' => $post, 'comments' => $comments));
    }

    public function all()
    {
        if (!$this->ion_auth->logged_in())
        {
            redirect('auth/login');
        }
        $posts = $this->posts_model->get_posts(true);
        $pagination = paginate($posts);
        $this->load->view('posts/all', array('posts' => $posts, 'pagination' => $pagination));
    }

    public function search()
    {
        if($this->input->method() == 'post')
        {
            $keywords = $this->input->post('search');
            $posts = $this->posts_model->search($keywords);
            $pagination = paginate($posts);
            $this->load->view('posts/search', compact('posts', 'keywords', 'pagination'));
            return;
        }
        $this->archives();
    }

    public function archives()
    {
        $posts = $this->posts_model->get_posts_archive();

        $archives = array();

        for($i = 0; $i <= count($posts) - 1; $i++)
        {
            $year = date('Y', strtotime($posts[$i]->publish_date));
            if(!isset($archives[$year]))
            {
                $archives[$year] = array();
            }
            $month = date('F', strtotime($posts[$i]->publish_date));
            if(!isset($archives[$year][$month]))
            {
                $archives[$year][$month] = array();
            }
            $archives[$year][$month][] = $posts[$i];

        }

        $this->load->view('posts/archives', array('archives' => $archives));
    }

    public function tagged($tag)
    {
        $this->load->helper('pagination');
        $this->load->helper('html');
        $this->load->helper('post');

        $posts = $this->posts_model->get_by_tag($tag);
        $pagination = paginate($posts);
        $this->load->view('posts/tagged', array('posts' => $posts, 'pagination' => $pagination, 'tag' => $tag));
    }

}
