<?php
class Users_model extends CI_Model {

	public function get_users($nick = FALSE, $id = FALSE, $page = 1)
	{
		if ($nick === FALSE && $id === FALSE) {
			$this->db->select('*');
			$this->db->from('usr');
			$this->db->join('prf', 'prf.usr_id = usr.usr_id');
			$this->db->order_by('prf_date', 'desc');

			// paginate
			$page--;
			$from = $page * $this->config->item('per_page');
			$this->db->limit($this->config->item('per_page'), $from);

			$query = $this->db->get();

			return $query->result_array();
		}

		if ($id === FALSE) {
			$this->db->select('*');
			$this->db->from('usr');
			$this->db->join('prf', 'prf.usr_id = usr.usr_id');
			$this->db->where('usr_nick', $nick);
			$query = $this->db->get();
		} else if ($nick === FALSE) {
			$this->db->select('*');
			$this->db->from('usr');
			$this->db->join('prf', 'prf.usr_id = usr.usr_id');
			$this->db->where('usr_id', $id);
			$query = $this->db->get();
		} else {
			$this->db->select('*');
			$this->db->from('usr');
			$this->db->join('prf', 'prf.usr_id = usr.usr_id');
			$this->db->where('usr_nick', $nick);
			$this->db->where('usr_id', $id);
			$query = $this->db->get();
		}

		return $query->row_array();
	}

	public function set_user()
	{
		$data = array(
			'usr_nick' => $this->input->post('username'),
			'usr_pass' => hash('sha256', $this->config->item('global_salt') . $this->input->post('password'))
		);

		return $this->db->insert('usr', $data);
	}

	public function set_profile()
	{
		$data = array(
			'usr_id' => $this->db->insert_id(),
			'prf_mail' => $this->input->post('mail'),
			'prf_date' => date('Y-m-d H:i:s'),
			'prf_act' => 'Z'
		);

		return $this->db->insert('prf', $data);
	}

	public function check_user($nick, $pass)
	{
		$this->db->select('*');
		$this->db->from('usr');
		$this->db->join('prf', 'usr.usr_id = prf.usr_id');
		$this->db->where('usr_nick', $nick);
		$this->db->where('usr_pass', $pass);
		$query = $this->db->get();

		if ($query) {
			return $query->row_array();
		} else {
			return false;
		}
	}

	public function delete_user($id)
	{
		return $this->db->delete('usr', array('usr_id' => $id));
	}

	public function get_userPosts($nick, $page = FALSE)
	{
		$this->db->select('*');
		$this->db->from('posts');
		$this->db->join('drawers', 'drawers.drawer_id = posts.drawer_id');
		$this->db->join('usr', 'usr.usr_id = posts.usr_id');
		$this->db->where('usr.usr_nick', $nick);
		$this->db->order_by('post_date', 'desc');

		if ($page) {
			// start at page 0
			$page--;
			$from = $page * $this->config->item('per_page');
			$this->db->limit($this->config->item('per_page'), $from);
		}

		$query = $this->db->get();

		return $query->result_array();
	}
}
