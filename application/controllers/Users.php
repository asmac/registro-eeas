<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user');
	}

	public function index()
	{
		if ($this->input->post('del')) {
			$this->user->delete($this->input->post('del'));
			$this->session->set_flashdata('msg_success', 'Los usuarios han sido eliminados de manera permanente.');
			redirect('users');
		}

		$this->load->library('pagination');
		$default     = array('search', 'offset');
		$param       = $this->uri->uri_to_assoc(3, $default);
		$num_results = 15;

		$param['search']     = ($this->input->post('search') != '') ? $this->input->post('search', TRUE):$param['search'];
		$data                = array();
		$data['msg_success'] = $this->session->flashdata('msg_success');
		$data['query']       = $this->user->search( $param['search'], $param['offset'], $num_results );
		$data['search']      = $param['search'];
		$data['form_action'] = '/users';

		if (empty($param['search'])) {
			unset($param['search']);
			$config['uri_segment'] = 4;
		} else {
			$config['uri_segment'] = 6;
		}

		$param['offset']      = '';
		$config['total_rows'] = $this->user->found_rows();
		$config['base_url']   = '/users/index/'.$this->uri->assoc_to_uri($param);
		$config['per_page']   = $num_results;

		$this->pagination->initialize($config);

		$data['pages']       = $this->pagination->create_links();
		$config['num_links']  = 1;

		$this->pagination->initialize($config);
		$data['pages_mobile']   = $this->pagination->create_links();


		$this->template->asset_js('crud.js');
		$this->template->write('title', 'Usuarios');
		$this->template->write_view('content', 'users/list', $data);
		$this->template->render();
	}

	public function add()
	{
		$this->form_validation->set_rules('data[name]', 'nombre', 'required|trim');
		$this->form_validation->set_rules('data[mail]', 'correo', 'required|valid_email|trim');
		$this->form_validation->set_rules('data[user]', 'usuario', 'required|is_unique[users.user]|trim');
		$this->form_validation->set_rules('data[pass]', 'contraseña', 'required|min_length[8]|matches[repeat]|trim');
		$this->form_validation->set_rules('repeat', 'repetir', 'required|trim');

		if ($this->form_validation->run()) {
			$this->user->insert($this->input->post('data', TRUE));
			$this->session->set_flashdata('msg_success', 'El usuario ha sido agregado.');
			redirect('users');
		}

		$data = $this->user->prepare_data($this->input->post('data'));
		$data['form_title'] = 'Nuevo Usuario';
		$data['breadcrumb'] = 'Nuevo';

		if(!isset($_POST['data'])){
			$data['active'] = 1;
		}

		$this->template->write_view('content', 'users/form', $data);
		$this->template->add_css('assets/vendor/switchery/switchery.css');
		$this->template->add_js('assets/vendor/switchery/switchery.js');
		$this->template->render();
	}

	public function edit($id = '')
	{
		if (!$this->user->exists($id)) {
			redirect('users');
		}

		$stored = $this->user->get($id)->row_array();
		$this->form_validation->set_rules('data[name]', 'nombre', 'required|trim');
		$this->form_validation->set_rules('data[mail]', 'correo', 'required|valid_email|trim');

		if (isset($_POST['data']) && strtolower($stored['user']) != strtolower($_POST['data']['user'])) {
			$this->form_validation->set_rules('data[user]', 'usuario', 'required|is_unique[users.user]|trim');
		}

		if (isset($_POST['data']['pass']) && !empty($_POST['data']['pass'])) {
			$this->form_validation->set_rules('data[pass]', 'contraseña', 'required|min_length[8]|matches[repeat]|trim');
			$this->form_validation->set_rules('repeat', 'repetir', 'required|trim');
		}

		if ($this->form_validation->run()) {
			$this->user->update($this->input->post('data', TRUE), $id);
			$this->session->set_flashdata('msg_success', 'Los datos del usuario han sido actualizados.');

			if ($id == $_SESSION['session_id']) {
				$this->user->build_session('id', $id);
			}

			redirect('users');
		}

		$data = $this->user->prepare_data($this->input->post('data'), $stored);
		$data['form_title'] = 'Editar Usuario';
		$data['breadcrumb'] = 'Editar';

		$this->template->write_view('content', 'users/form', $data);
		$this->template->add_css('assets/vendor/switchery/switchery.css');
		$this->template->add_js('assets/vendor/switchery/switchery.js');
		$this->template->render();
	}

	public function delete($id = '')
	{
		if (!empty($id) && $id > 1) {
			$this->user->delete($id);
			$this->session->set_flashdata('msg_success', 'El usuario ha sido eliminado.');
		}

		redirect('users');
	}

}

/* End of file Users.php */
/* Location: ./application/controllers/Users.php */
