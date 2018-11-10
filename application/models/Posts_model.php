<?php
class Posts_model extends CI_Model {
	public function __construct()
	{
		$this->load->model('drawers_model');
		$this->load->model('users_model');
	}

	public function get_posts($slug = FALSE, $id = FALSE, $page = 1)
	{
		// do we need pagination?
		if ($page !== FALSE) {
			$this->db->start_cache();
		}

		$this->db->select('*');
		$this->db->from('posts');

		// multiple posts array
		if ($slug === FALSE && $id === FALSE) {
			$this->db->join('drawers', 'posts.drawer_id = drawers.drawer_id');
			$this->db->join('usr', 'posts.usr_id = usr.usr_id');
			$this->db->stop_cache();

			// pagination class
			$this->db->order_by('post_date', 'desc');
			$page--;
			$from = $page * $this->config->item('per_page');
			$this->db->limit($this->config->item('per_page'), $from);

			$query = $this->db->get();
			return $query->result_array();
		}

		// single post row array
		$this->db->where('posts.post_id', $id);
		$this->db->join('usr', 'posts.usr_id = usr.usr_id');
		$this->db->join('drawers', 'posts.drawer_id = drawers.drawer_id');
		
		// do we need pagination?
		if ($page !== FALSE) {
			$this->db->stop_cache();
		}

		$query = $this->db->get();

		return $query->row_array();
	}

	public function set_post($id = FALSE)
	{
		$this->load->library('upload');

		// post content
		$data = array(
			'post_title' => $this->input->post('title'),
			'post_text' => $this->input->post('text'),
			'drawer_id' => $this->input->post('drawer')
		);

		// create
		if ($id === FALSE) {
			$data['usr_id'] = $this->session->usr_id;
			$data['post_date'] = date('Y-m-d H:i:s');
			$data['post_slug'] = url_title(convert_accented_characters($this->input->post('title')), 'dash', TRUE);
			$data['post_image'] = $this->upload->data('file_name');

			return $this->db->insert('posts', $data);

		// update
		} else {
			$this->db->where('post_id', $id);
			return $this->db->update('posts', $data);
		}
	}

	public function delete_post($id)
	{
		return $this->db->delete('posts', array('post_id' => $id));
	}
}
