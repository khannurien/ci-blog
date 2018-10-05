<?php
class Drawers extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('drawers_model');
		$this->load->library('parsedown');
		$this->load->library('parsedownExtra');
	}

	public function index()
	{
		$data['drawers'] = $this->drawers_model->get_drawers();
		$data['title'] = 'Drawers';

		$Parsedown = new ParsedownExtra();

		foreach ($data['drawers'] as &$drawers_item) {
			$drawers_item['drawer_text'] = $Parsedown->text($drawers_item['drawer_text']);
		}

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/main', $data);
		$this->load->view('drawers/index', $data);
		$this->load->view('templates/footer', $data);
	}

	public function view($slug = NULL, $id = NULL)
	{
		$data['drawers_item'] = $this->drawers_model->get_drawers($slug, $id);

		if (empty($data['drawers_item'])) {
			show_404();
		}

		$Parsedown = new ParsedownExtra();
		$md = $Parsedown->text($data['drawers_item']['drawer_text']);

		$data['title'] = $data['drawers_item']['drawer_title'];
		$data['drawers_item']['drawer_text'] = $md;

		$data['posts'] = $this->drawers_model->get_drawerPosts($id);
        foreach ($data['posts'] as &$posts_item) {
            $posts_item['post_text'] = $Parsedown->text($posts_item['post_text']);
        }

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/main', $data);
		$this->load->view('drawers/view', $data);
		$this->load->view('templates/footer', $data);
	}

	public function create()
	{
		// permissions test
		if ($this->session->prf_act != "A") {
			redirect('/users');
		}

		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['title'] = 'Create new drawer';

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('text', 'Content', 'required');

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/main', $data);

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('drawers/create');
		} else {
			$this->drawers_model->set_drawer();
			redirect('/drawers');
		}

		$this->load->view('templates/footer', $data);
	}

	public function edit($slug, $id)
	{
		// permissions test
		if ($this->session->prf_act != "A") {
			redirect('/users');
		}

		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['drawers_item'] = $this->drawers_model->get_drawers($slug, $id);

		if (empty($data['drawers_item'])) {
			show_404();
		}

		$data['title'] = 'Edit drawer';

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('text', 'Content', 'required');

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/main', $data);

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('drawers/edit', $data);
		} else {
			$this->drawers_model->set_drawer($slug, $id);
			redirect('/drawers/' . $slug . '/' . $id);
		}

		$this->load->view('templates/footer', $data);
	}

	public function delete($slug, $id)
	{
		// permissions test
		if ($this->session->prf_act != "A") {
			redirect('/users');
		}

		$this->drawers_model->delete_drawer($slug, $id);
		redirect ('/drawers');
	}
}