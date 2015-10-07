<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member extends MY_Model {

	protected $_id         = 'cum';
	protected $_table      = 'regnal';
	protected $field_names = array('nombre', 'provincia', 'localidad', 'grupo', 'nivel', 'vigencia', 'nacimiento');
	protected $grid_fields = 'cum, nombre, provincia, nivel, vigencia';

	public function __construct()
	{
		parent::__construct();
	}

	public function search_procedure($search = '')
	{
		$this->db->like('nombre', $search, 'both');
		$this->db->or_like('provincia', $search, 'both');
		$this->db->or_like('localidad', $search, 'both');
		$this->db->order_by('provincia, localidad, nombre', 'asc');
	}

}

/* End of file Member.php */
/* Location: ./application/models/Member.php */
