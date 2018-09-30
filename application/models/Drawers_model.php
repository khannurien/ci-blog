<?php
class Drawers_model extends CI_Model {

    public function get_drawers($slug = FALSE, $id = FALSE)
    {
        $this->db->select('*');
        $this->db->from('drawers');

        if ($slug === FALSE || $id === FALSE) {
            $this->db->order_by('drawer_title');
            $query = $this->db->get();

            return $query->result_array();
        }

        $this->db->where('drawer_slug', $slug);
        $this->db->where('drawer_id', $id);
        $query = $this->db->get();

        return $query->row_array();
    }

	public function set_drawer($slug = FALSE, $id = FALSE)
	{
		$this->load->helper('text');

		$drawer_slug = url_title(convert_accented_characters($this->input->post('title')), 'dash', TRUE);

		$data = array(
			'drawer_title' => $this->input->post('title'),
			'drawer_text' => $this->input->post('text')
		);

		// create
		if ($slug === FALSE || $id === FALSE) {
			$data['drawer_slug'] = $drawer_slug;

            return $this->db->insert('drawers', $data);

		// update
		} else {
			$this->db->where('drawer_id', $id);
			$this->db->where('drawer_slug', $slug);
			return $this->db->update('drawers', $data);
		}
	}

	public function delete_drawer($slug, $id)
	{
		return $this->db->delete('drawers', array('drawer_slug' => $slug, 'drawer_id' => $id));
	}

	public function get_drawerPosts($id)
	{
		$this->db->select('*');
		$this->db->from('posts');
		$this->db->join('drawers', 'drawers.drawer_id = posts.drawer_id');
		$this->db->join('usr', 'usr.usr_id = posts.usr_id');
		$this->db->where('posts.drawer_id', $id);
		$this->db->order_by('post_date', 'desc');

		$query = $this->db->get();

		return $query->result_array();
	}
}
