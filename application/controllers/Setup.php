<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setup extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('migration');
	}

	public function index()
	{
		if (! $this->migration->current()) {
			show_error($this->migration->error_string());
		} else {
			echo "Done.";
		}
	}

	public function rollback($version = '')
	{
		if (empty($version)) {
			$this->config->load('migration');
			$version = $this->config->item('migration_version') - 1;
		}

		if (! $this->migration->version($version)) {
			show_error($this->migration->error_string());
		} else {
			echo "Migrated to version: $version";
		}
	}

}

/* End of file Setup.php */
/* Location: ./application/controllers/Setup.php */
