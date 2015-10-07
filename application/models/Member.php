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

	public function search_proccedure($search = '')
	{
		$this->db->where('nombre', $search);
		$this->db->or_where('provincia', $search);
		$this->db->or_where('localidad', $search);

		$this->db->order_by('provincia, localidad, nombre', 'asc');
	}

}

/* End of file Member.php */
/* Location: ./application/models/Member.php */
