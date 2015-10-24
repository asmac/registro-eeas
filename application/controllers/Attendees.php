<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Attendees extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->template->render();
	}

	public function switch()
	{
		$this->template->render();
	}

}

/* End of file Attendees.php */
/* Location: ./application/controllers/Attendees.php */
