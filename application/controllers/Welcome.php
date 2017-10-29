<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('posts_model');
    }

	public function index()
	{
        $this->load->helper('pagination');
        $this->load->helper('html');
        $this->load->helper('post');

        $posts = $this->posts_model->get_posts();
        $pagination = paginate($posts);
        $this->load->view('home', array('posts' => $posts, 'pagination' => $pagination));
	}
}
