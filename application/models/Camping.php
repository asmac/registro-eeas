<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Camping extends MY_Model {

	protected $_id         = 'id';
	protected $_table      = 'campings';
	protected $field_names = array('name', 'occupation');
	protected $grid_fields = 'id, name, occupation';

	public function __construct()
	{
		parent::__construct();
	}

	public function update_occupation()
	{
		$this->db->simple_query('UPDATE campings SET occupation = (SELECT COUNT(cum) FROM attendees WHERE attendees.id_camping = campings.id)');
		return $this->db->affected_rows();
	}

}

/* End of file Camping.php */
/* Location: ./application/models/Camping.php */
