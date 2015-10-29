<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Attendees extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->template->write('title', 'Registro');
		$this->template->write_view('content', 'attendees/index');
		$this->template->add_css('assets/vendor/switchery/switchery.css');
		$this->template->add_js('assets/vendor/switchery/switchery.js');
		$this->template->add_css('assets/vendor/fuelux/css/fuelux.min.css');
		$this->template->add_js('assets/vendor/fuelux/js/fuelux.min.js');
		$this->template->render();
	}

	public function change()
	{
		$this->template->write('title', 'Cambio de Pago');
		$this->template->write_view('content', 'attendees/change');
		$this->template->add_css('assets/vendor/fuelux/css/fuelux.min.css');
		$this->template->add_js('assets/vendor/fuelux/js/fuelux.min.js');
		$this->template->asset_js('attendees.js');
		$this->template->render();
	}

}

/* End of file Attendees.php */
/* Location: ./application/controllers/Attendees.php */
