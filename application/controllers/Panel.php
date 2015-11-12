<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Panel extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data = array(
			'regnal'     => $this->db->count_all('regnal'),
			'registered' => $this->db->where('id_camping >', '0')->count_all_results('attendees'),
			'left'       => $this->db->where('id_camping', '0')->count_all_results('attendees'),
			'campings'   => $this->db->count_all('campings'),
			'switches'   => $this->db->where('switch !=', '')->count_all_results('attendees')
		);

		$this->template->write('title', 'Panel');
		$this->template->write_view('content', 'admin/index', $data);
		$this->template->render();
	}

}

/* End of file Panel.php */
/* Location: ./application/controllers/Panel.php */
