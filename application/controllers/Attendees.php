<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Attendees extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('attendee');
		$this->load->model('member');
	}

	public function index()
	{
		$this->template->write('title', 'Registro');
		$this->template->write_view('content', 'attendees/index');
		$this->template->add_css('assets/vendor/switchery/switchery.css');
		$this->template->add_js('assets/vendor/switchery/switchery.js');
		$this->template->add_css('assets/vendor/fuelux/css/fuelux.min.css');
		$this->template->add_js('assets/vendor/fuelux/js/fuelux.min.js');
		$this->template->add_js('assets/vendor/loadTemplate.js');
		$this->template->asset_js('attendees.js');
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

	public function validate_adult()
	{
		if (!$this->input->is_ajax_request()) {
			redirect('/');
		}

		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_rules('cum', 'cum', 'required|trim|registered|paid|legal_age');

		if ($this->form_validation->run()) {
			$member = $this->member->where('cum', $this->input->post('cum'))->limit(1)->get()->row_array();
			$output = array('status' => 'success', 'message' => 'Miembro validado', 'cum' => $this->input->post('cum'), 'member' => $member);
		} else {
			$output = array('status' => 'error', 'message' => form_error('cum'));
		}

		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function validate_element()
	{
		if (!$this->input->is_ajax_request()) {
			redirect('/');
		}

		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_rules('cum', 'cum', 'required|trim|registered|paid');

		if ($this->form_validation->run()) {
			$member = $this->member->where('cum', $this->input->post('cum'))->limit(1)->get()->row_array();
			$output = array('status' => 'success', 'message' => 'Miembro validado', 'cum' => $this->input->post('cum'), 'member' => $member);
		} else {
			$output = array('status' => 'error', 'message' => form_error('cum'));
		}

		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

}

/* End of file Attendees.php */
/* Location: ./application/controllers/Attendees.php */