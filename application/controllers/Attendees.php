<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Attendees extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('attendee');
		$this->load->model('member');
		$this->load->model('camping');
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

	public function switch_payment()
	{
		$this->form_validation->set_rules('paid', 'cum pagado', 'required|trim|paid|already_in');
		$this->form_validation->set_rules('switch', 'cum cambio', 'required|trim|registered');

		if ($this->form_validation->run()) {
			$this->attendee->payment_change($this->input->post('paid'), $this->input->post('switch'));
			$this->session->set_flashdata('msg_success', "El pago del miembro {$this->input->post('paid')} ha sido cambiado por el miembro {$this->input->post('switch')}.");
			redirect('attendees/switch-payment');
		}

		$this->template->write('title', 'Cambio de Pago');
		$this->template->write_view('content', 'attendees/change');
		$this->template->render();
	}

	public function validate_adult()
	{
		if (!$this->input->is_ajax_request()) {
			redirect('/');
		}

		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_rules('cum', 'cum', 'required|trim|registered|paid|legal_age|already_in');

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
		$this->form_validation->set_rules('cum', 'cum', 'required|trim|registered|paid|already_in');

		if ($this->form_validation->run()) {
			$member = $this->member->where('cum', $this->input->post('cum'))->limit(1)->get()->row_array();
			$output = array('status' => 'success', 'message' => 'Miembro validado', 'cum' => $this->input->post('cum'), 'member' => $member);
		} else {
			$output = array('status' => 'error', 'message' => form_error('cum'));
		}

		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function validate_attendee()
	{
		if (!$this->input->is_ajax_request()) {
			redirect('/');
		}

		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_rules('cum', 'cum', 'required|trim|paid');
		if ($this->form_validation->run()) {
			$cum = $this->attendee->find_registered($this->input->post('cum'));
			if ($cum !== FALSE) {
				$output = array('status' => 'success', 'message' => 'Miembro encontrado', 'cum' => $cum);
			} else {
				$output = array('status' => 'error', 'message' => 'El miembro no ha llegado al evento');
			}
		} else {
			$output = array('status' => 'error', 'message' => form_error('cum'));
		}

		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function register()
	{
		if (!$this->input->is_ajax_request()) {
			redirect('/');
		}

		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_rules('responsible', 'responsable', 'required|trim|registered|paid|legal_age|already_in');
		$this->form_validation->set_rules('camp', 'acampado', 'required|trim');

		if ($this->form_validation->run()) {
			$this->attendee->register($this->input->post('responsible'), $this->input->post('scouts'), $this->input->post('camp'));
			$output = array('status' => 'success', 'message' => 'Se ha completado el proceso de registro.');
		} else {
			$output = array('status' => 'error', 'message' => validation_errors());
		}

		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function search()
	{
		$this->template->write('title', 'Búsqueda');
		$this->template->write_view('content', 'attendees/search');
		$this->template->asset_js('attendees.js');
		$this->template->render();
	}

	public function view($cum = '')
	{
		if (!$this->attendee->is_registered($cum)) {
			redirect('attendees/search');
		}

		$data = array(
			'adult'       => $this->attendee->get($cum)->row(),
			'elements'    => $this->attendee->where('responsible', $cum)->get()
		);

		$this->template->write('title', 'Participante');
		$this->template->write_view('content', 'attendees/view', $data);
		$this->template->render();
	}

	public function change_camping($cum = '')
	{
		if (!$this->attendee->is_registered($cum)) {
			redirect('attendees/search');
		}

		$this->form_validation->set_rules('camp', 'acampado', 'required|trim');

		if ($this->form_validation->run()) {
			$this->attendee->change_camping($cum, $this->input->post('camp', TRUE));
			$this->camping->update_occupation();
			$this->session->set_flashdata('msg_success', "Se ha cambiado el area de acampado asignado.");
			redirect('attendees/view/' . $cum);
		}

		$data = array(
			'cum' => $cum,
			'campings' => $this->camping->get()
		);

		$this->template->write('title', 'Cambiar Acampado');
		$this->template->write_view('content', 'attendees/change_camping', $data);
		$this->template->asset_js('attendees.js');
		$this->template->render();
	}

	public function change_responsible($cum)
	{
		if (!$this->attendee->has_elements($cum)) {
			redirect('attendees/search');
		}

		$this->form_validation->set_rules('cum', 'cum', 'required|trim|registered|paid|legal_age|already_in');

		if ($this->form_validation->run()) {
			$this->attendee->change_responsible($cum, $this->input->post('cum', TRUE));
			$this->session->set_flashdata('msg_success', "El adulto responsable ha sido cambiado.");
			redirect('attendees/view/' . $this->input->post('cum', TRUE));
		}

		$data = array('cum' => $cum);
		$this->template->write('title', 'Cambiar Adulto');
		$this->template->write_view('content', 'attendees/change_responsible', $data);
		$this->template->render();
	}

	public function elements($cum = '')
	{
		if (!$this->attendee->is_registered($cum)) {
			redirect('attendees/search');
		}

		$data = array(
			'cum' => $cum,
			'adult' => $this->attendee->get($cum)->row(),
			'elements' => $this->attendee->where('responsible', $cum)->get()
		);

		$this->template->write('title', 'Elementos');
		$this->template->write_view('content', 'attendees/elements', $data);
		$this->template->add_js('assets/vendor/loadTemplate.js');
		$this->template->asset_js('attendees.js');
		$this->template->render();
	}

	public function add_element()
	{
		if (!$this->input->is_ajax_request()) {
			redirect('/');
		}

		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_rules('cum', 'cum', 'required|trim|registered|paid|already_in');
		$this->form_validation->set_rules('responsible', 'adulto', 'required|trim');
		$this->form_validation->set_rules('camping', 'acampado', 'required|trim');

		if ($this->form_validation->run()) {
			$element = $this->attendee->add_element($this->input->post('responsible'), $this->input->post('cum'), $this->input->post('camping'));
			$this->camping->update_occupation();
			$output = array('status' => 'success', 'message' => 'Se ha completado el proceso de registro.', 'member' => $element);
		} else {
			$output = array('status' => 'error', 'message' => validation_errors());
		}

		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function remove_element()
	{
		if (!$this->input->is_ajax_request()) {
			redirect('/');
		}

		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_rules('cum', 'cum', 'required|trim');

		if ($this->form_validation->run()) {
			$this->attendee->remove_element($this->input->post('cum'));
			$this->camping->update_occupation();
			$output = array('status' => 'success', 'message' => 'Se ha eliminado al elemento.');
		} else {
			$output = array('status' => 'error', 'message' => validation_errors());
		}

		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

}

/* End of file Attendees.php */
/* Location: ./application/controllers/Attendees.php */
