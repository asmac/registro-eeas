<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Panel extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->template->render();
	}

}

/* End of file Panel.php */
/* Location: ./application/controllers/Panel.php */
