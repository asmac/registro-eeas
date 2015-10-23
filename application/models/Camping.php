<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Camping extends CI_Model {

	protected $_id         = 'id';
	protected $_table      = 'camping';
	protected $field_names = array('name', 'occupation');
	protected $grid_fields = 'id, name, occupation';

	public function __construct()
	{
		parent::__construct();
	}

}

/* End of file Camping.php */
/* Location: ./application/models/Camping.php */
