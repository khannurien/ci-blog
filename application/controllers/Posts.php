<?php
class Posts extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
        $this->load->model('drawers_model');
		$this->load->model('posts_model');
		$this->load->model('users_model');

        $this->load->library('parsedown');
        $this->load->library('parsedownExtra');
		$this->load->library('form_validation');

		$this->load->helper('form');
	}

	public function index()
	{
		$data['posts'] = $this->posts_model->get_posts();
		$data['title'] = 'Posts';

		$Parsedown = new ParsedownExtra();

		foreach ($data['posts'] as &$posts_item) {
			$posts_item['post_text'] = $Parsedown->text($posts_item['post_text']);
		}

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/main', $data);
		$this->load->view('posts/index', $data);
		$this->load->view('templates/footer', $data);
	}

	public function view($slug = NULL, $id = NULL)
	{
		$data['posts_item'] = $this->posts_model->get_posts($slug, $id);

        if (empty($data['posts_item'])) {
		    show_404();
		}

        $Parsedown = new Parsedown();
        $md = $Parsedown->text($data['posts_item']['post_text']);

		$data['title'] = $data['posts_item']['post_title'];
        $data['posts_item']['post_text'] = $md;

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/main', $data);
		$this->load->view('posts/view', $data);
		$this->load->view('templates/footer', $data);
	}

	public function create()
	{
		// permissions test
		if ($this->session->prf_act != "A") {
			redirect('/posts');
		}

		$data['title'] = 'Create new post';

        // drawers table
        $data['drawers'] = $this->drawers_model->get_drawers();

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('text', 'Content', 'required');
		$this->form_validation->set_rules('drawer', 'Drawer', 'required');

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/main', $data);

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('posts/create');
		} else {
			$this->posts_model->set_post();
			redirect('/posts');
		}

		$this->load->view('templates/footer', $data);
	}

	public function edit($slug, $id)
	{
		// permissions test
		if ($this->session->prf_act != "A") {
			redirect('/posts');
		}

		$data['posts_item'] = $this->posts_model->get_posts($slug, $id);

		if (empty($data['posts_item'])) {
			show_404();
		}

		$data['title'] = 'Edit post';

        // drawers table
        $data['drawers'] = $this->drawers_model->get_drawers();

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('text', 'Content', 'required');
		$this->form_validation->set_rules('drawer', 'Drawer', 'required');

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/main', $data);

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('posts/edit', $data);
		} else {
			$this->posts_model->set_post($slug, $id);
			redirect('/posts/' . $slug . '/' . $id);
		}

		$this->load->view('templates/footer', $data);
	}

	public function delete($slug, $id)
	{
		// permissions test
		if ($this->session->prf_act != "A") {
			redirect('/posts');
		}

		$this->posts_model->delete_post($slug, $id);
		redirect ('/posts');
	}
}