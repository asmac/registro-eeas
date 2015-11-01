<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Regnal extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('member');
	}

	public function index()
	{
		if ($this->input->post('del')) {
			$this->member->delete($this->input->post('del'));
			$this->session->set_flashdata('msg_success', 'Los miembros han sido eliminados de manera permanente.');
			redirect('regnal');
		}

		$this->load->library('pagination');
		$default     = array('search', 'offset');
		$param       = $this->uri->uri_to_assoc(3, $default);
		$num_results = 15;

		$param['search']     = ($this->input->post('search') != '') ? $this->input->post('search', TRUE):$param['search'];
		$data                = array();
		$data['msg_success'] = $this->session->flashdata('msg_success');
		$data['query']       = $this->member->search( $param['search'], $param['offset'], $num_results );
		$data['search']      = $param['search'];
		$data['form_action'] = '/regnal';

		if (empty($param['search'])) {
			unset($param['search']);
			$config['uri_segment'] = 4;
		} else {
			$config['uri_segment'] = 6;
		}

		$param['offset']      = '';
		$config['total_rows'] = $this->member->found_rows();
		$config['base_url']   = '/regnal/index/'.$this->uri->assoc_to_uri($param);
		$config['per_page']   = $num_results;

		$this->pagination->initialize($config);

		$data['pages']        = $this->pagination->create_links();
		$config['num_links']  = 1;

		$this->pagination->initialize($config);
		$data['pages_mobile'] = $this->pagination->create_links();


		$this->template->asset_js('crud.js');
		$this->template->write('title', 'Regnal');
		$this->template->write_view('content', 'regnal/list', $data);
		$this->template->render();
	}

	public function add()
	{
		$this->form_validation->set_rules('data[cum]', 'cum', 'required|trim');
		$this->form_validation->set_rules('data[nombre]', 'nombre', 'required|trim');
		$this->form_validation->set_rules('data[provincia]', 'provincia', 'required|trim');
		$this->form_validation->set_rules('data[localidad]', 'localidad', 'required|trim');
		$this->form_validation->set_rules('data[grupo]', 'grupo', 'required|trim');
		$this->form_validation->set_rules('data[nivel]', 'nivel', 'required|trim');
		$this->form_validation->set_rules('data[vigencia]', 'vigencia', 'required|trim');
		$this->form_validation->set_rules('data[nacimiento]', 'nacimiento', 'required|trim');

		if ($this->form_validation->run()) {
			$this->member->insert($this->input->post('data', TRUE));
			$this->session->set_flashdata('msg_success', 'El miembro ha sido agregado.');
			redirect('regnal');
		}

		$data = $this->member->prepare_data($this->input->post('data'));
		$data['form_title'] = 'Nuevo Miembro';
		$data['breadcrumb'] = 'Nuevo';

		$this->template->write_view('content', 'regnal/form', $data);
		$this->template->write('title', 'Nuevo Miembro');
		$this->template->render();
	}

	public function edit($id = '')
	{
		if (! $this->member->exists($id)) {
			redirect('regnal');
		}

		$stored = $this->member->get($id)->row_array();

		$this->form_validation->set_rules('data[cum]', 'cum', 'required|trim');
		$this->form_validation->set_rules('data[nombre]', 'nombre', 'required|trim');
		$this->form_validation->set_rules('data[provincia]', 'provincia', 'required|trim');
		$this->form_validation->set_rules('data[localidad]', 'localidad', 'required|trim');
		$this->form_validation->set_rules('data[grupo]', 'grupo', 'required|trim');
		$this->form_validation->set_rules('data[nivel]', 'nivel', 'required|trim');
		$this->form_validation->set_rules('data[vigencia]', 'vigencia', 'required|trim');
		$this->form_validation->set_rules('data[nacimiento]', 'nacimiento', 'required|trim');

		if ($this->form_validation->run()) {
			$this->member->update($this->input->post('data', TRUE), $id);
			$this->session->set_flashdata('msg_success', 'El miembro ha sido actualizado.');
			redirect('regnal');
		}

		$data = $this->member->prepare_data($this->input->post('data'), $stored);
		$data['form_title'] = 'Editar Miembro';
		$data['breadcrumb'] = 'Editar';

		$this->template->write_view('content', 'regnal/form', $data);
		$this->template->write('title', 'Editar Miembro');
		$this->template->render();
	}

	public function delete($id = '')
	{
		if (!empty($id)) {
			$this->member->delete($id);
			$this->session->set_flashdata('msg_success', 'El miembro ha sido eliminado.');
		}

		redirect('regnal');
	}

}

/* End of file Regnal.php */
/* Location: ./application/controllers/Regnal.php */
