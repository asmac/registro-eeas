<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Campings extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('camping');
	}

	public function index()
	{
		if ($this->input->post('del')) {
			$this->camping->delete($this->input->post('del'));
			$this->session->set_flashdata('msg_success', 'Los campos han sido eliminados de manera permanente.');
			redirect('campings');
		}

		$this->load->library('pagination');
		$default     = array('search', 'offset');
		$param       = $this->uri->uri_to_assoc(3, $default);
		$num_results = 15;

		$param['search']     = ($this->input->post('search') != '') ? $this->input->post('search', TRUE):$param['search'];
		$data                = array();
		$data['msg_success'] = $this->session->flashdata('msg_success');
		$data['query']       = $this->camping->search( $param['search'], $param['offset'], $num_results );
		$data['search']      = $param['search'];
		$data['form_action'] = '/campings';

		if (empty($param['search'])) {
			unset($param['search']);
			$config['uri_segment'] = 4;
		} else {
			$config['uri_segment'] = 6;
		}

		$param['offset']      = '';
		$config['total_rows'] = $this->camping->found_rows();
		$config['base_url']   = '/campings/index/'.$this->uri->assoc_to_uri($param);
		$config['per_page']   = $num_results;

		$this->pagination->initialize($config);

		$data['pages']        = $this->pagination->create_links();
		$config['num_links']  = 1;

		$this->pagination->initialize($config);
		$data['pages_mobile'] = $this->pagination->create_links();


		$this->template->asset_js('crud.js');
		$this->template->write('title', 'Campos');
		$this->template->write_view('content', 'campings/list', $data);
		$this->template->render();
	}

	public function add()
	{
		$this->form_validation->set_rules('data[name]', 'nombre', 'required|trim');

		if ($this->form_validation->run()) {
			$this->camping->insert($this->input->post('data', TRUE));
			$this->session->set_flashdata('msg_success', 'El campo ha sido creado.');
			redirect('campings');
		}

		$data = $this->camping->prepare_data($this->input->post('data'));
		$data['form_title'] = 'Nuevo Campo';
		$data['breadcrumb'] = 'Nuevo';
		$this->template->write('title', $data['form_title']);
		$this->template->write_view('content', 'campings/form', $data);
		$this->template->render();
	}

	public function edit($id)
	{
		if (! $this->camping->exists($id)) {
			rediect('campings');
		}

		$this->form_validation->set_rules('data[name]', 'nombre', 'required|trim');

		if ($this->form_validation->run()) {
			$this->camping->update($this->input->post('data', TRUE), $id);
			$this->session->set_flashdata('msg_success', 'El campo ha sido actualizado.');
			redirect('campings');
		}

		$stored = $this->camping->get($id)->row_array();
		$data   = $this->camping->prepare_data($this->input->post('data'), $stored);
		$data['form_title'] = 'Editar Campo';
		$data['breadcrumb'] = 'Editar';
		$this->template->write('title', $data['form_title']);
		$this->template->write_view('content', 'campings/form', $data);
		$this->template->render();
	}

	public function delete($id = '')
	{
		if (!empty($id)) {
			$this->camping->delete($id);
			$this->session->set_flashdata('msg_success', 'El campo ha sido eliminado.');
		}

		redirect('campings');
	}

	public function get()
	{
		$data   = $this->camping->order_by('occupation', 'asc')->get();
		$camp   = array();

		if ($data->num_rows() > 0) {
			foreach ($data->result() as $row) {
				$camp[] = $row;
			}

			$output = array('status' => 'success', 'message' => 'campos disponibles', 'data' => $camp);
		} else {
			$output = array('status' => 'error', 'message' => 'No se han creado campos');
		}

		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

}

/* End of file Campings.php */
/* Location: ./application/controllers/Campings.php */
