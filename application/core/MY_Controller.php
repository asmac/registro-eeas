<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	private   $public    = array('access/', 'access/blocked', 'access/lost-password', 'access/reset-password');
	private   $no_block  = array('access/blocked', 'access/lost-password', 'access/reset-password');
	protected $allowed   = array(0);

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url', 'crud'));
		$this->load->library(array('session', 'form_validation'));
		$this->load->model('user');
		# user_auth object is initialized on user model

		$current       = $this->uri->segment(1, '') . '/' . $this->uri->segment(2, '');
		$is_public     = in_array($current, $this->public);
		$allow_blocked = in_array($current, $this->no_block);

		if ( ! $is_public && !$this->user_auth->is_logged()) {
			redirect('access');
		}

		if ( $is_public && $this->user_auth->is_logged() ) {
			redirect('');
		}

		if ( $this->user_auth->is_blocked() && !$allow_blocked ) {
			redirect('access/blocked');
		}

		$this->form_validation->set_error_delimiters('<div class="help-block">', '</div>');
	}

}

/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */
