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

	public function index($page = 1)
	{
		// fetch data according to page number, if given any
		$data['posts'] = $this->posts_model->get_posts(FALSE, FALSE, $page);
		$data = $this->security->xss_clean($data);
		$data['title'] = 'Posts';

		$Parsedown = new ParsedownExtra();

		foreach ($data['posts'] as &$posts_item) {
			$posts_item['post_text'] = $Parsedown->text($posts_item['post_text']);
		}

		// pagination configuration
		$config = array();
		$config['base_url'] = base_url('posts');
		$config['total_rows'] = $this->db->count_all_results();
		$config['uri_segment'] = 2;
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/main', $data);
		$this->load->view('posts/index', $data);
		$this->load->view('templates/footer', $data);
	}

	public function view($slug = NULL, $id = NULL)
	{
		$data['posts_item'] = $this->posts_model->get_posts($slug, $id);
		$data = $this->security->xss_clean($data);

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
			redirect(base_url('posts'));
		}

		$this->load->library('upload');

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
			if ($this->upload->do_upload('image')) {
				$this->posts_model->set_post();
				redirect(base_url('posts'));
			} else {
				$data['upload_error'] = array('upload_error' => $this->upload->display_errors());
				$this->load->view('posts/create', $data['upload_error']);
			}
		}

		$this->load->view('templates/footer', $data);
	}

	public function edit($id)
	{
		// permissions test
		if ($this->session->prf_act != "A") {
			redirect(base_url('posts'));
		}

		$data['posts_item'] = $this->posts_model->get_posts(FALSE, $id, FALSE);

		if (empty($data['posts_item'])) {
			show_404();
		}

		$data['title'] = 'Edit post';

		// drawers table
		$data['drawers'] = $this->drawers_model->get_drawers();
		$data = $this->security->xss_clean($data);

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('text', 'Content', 'required');
		$this->form_validation->set_rules('drawer', 'Drawer', 'required');

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/main', $data);

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('posts/edit', $data);
		} else {
			$this->posts_model->set_post($id);
			redirect(base_url('posts/view/' . $data['posts_item']['post_slug'] . '/' . $id));
		}

		$this->load->view('templates/footer', $data);
	}

	public function delete($id)
	{
		// permissions test
		if ($this->session->prf_act != "A") {
			redirect(base_url());
		}

		$this->posts_model->delete_post($id);
		redirect(base_url('posts'));
	}
}
