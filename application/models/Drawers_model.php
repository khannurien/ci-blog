<?php
class Drawers_model extends CI_Model {

	public function get_drawers($slug = FALSE, $id = FALSE)
	{
		$this->db->select('*');
		$this->db->from('drawers');

		if ($slug === FALSE && $id === FALSE) {
			$this->db->order_by('drawer_title');
			$query = $this->db->get();

			return $query->result_array();
		}

		$this->db->where('drawer_id', $id);
		$query = $this->db->get();

		return $query->row_array();
	}

	public function set_drawer($id = FALSE)
	{
		$this->load->helper('text');

		$drawer_slug = url_title(convert_accented_characters($this->input->post('title')), 'dash', TRUE);

		$data = array(
			'drawer_title' => $this->input->post('title'),
			'drawer_text' => $this->input->post('text')
		);

		// create
		if ($id === FALSE) {
			$data['drawer_slug'] = $drawer_slug;

			return $this->db->insert('drawers', $data);

		// update
		} else {
			$this->db->where('drawer_id', $id);
			return $this->db->update('drawers', $data);
		}
	}

	public function delete_drawer($id)
	{
		return $this->db->delete('drawers', array('drawer_id' => $id));
	}

	public function get_drawerPosts($id, $page = 1)
	{
		$this->db->select('*');
		$this->db->from('posts');
		$this->db->join('drawers', 'drawers.drawer_id = posts.drawer_id');
		$this->db->join('usr', 'usr.usr_id = posts.usr_id');
		$this->db->where('posts.drawer_id', $id);
		$this->db->order_by('post_date', 'desc');

		$page--;
		$from = $page * $this->config->item('per_page');
		$this->db->limit($this->config->item('per_page'), $from);

		$query = $this->db->get();

		return $query->result_array();
	}
}
