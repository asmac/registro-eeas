<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Campings extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('camping');
	}

	public function index()
	{
		$this->template->render();
	}

	public function add()
	{
		# code...
	}

	public function edit($id)
	{
		if (! $this->camping->exists($id)) {
			rediect('campings');
		}
	}

	public function delete($id = '')
	{
		# code...
	}

}

/* End of file Campings.php */
/* Location: ./application/controllers/Campings.php */
