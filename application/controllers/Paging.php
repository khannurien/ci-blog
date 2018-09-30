<?php
class Paging extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('posts_model');
        $this->load->library('pagination');
    }

    public function index()
    {
        //$config['base_url'] = ?
    	$config['use_page_numbers'] = TRUE;
        $config['query_string_segment'] = 'page';
        $config['total_rows'] = $this->posts_model->total_posts();
        $config['per_page'] = 5;
        $config['uri_segment'] = 3;

        $this->pagination->initialize($config);

        if ($this->uri->segment(3)) {
            $page = $this->uri->segment(3);
        } else {
            $page = 1;
        }

    }
}
?>
