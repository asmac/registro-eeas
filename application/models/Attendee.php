<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Attendee extends MY_Model {

	protected $_id         = 'cum';
	protected $_table      = 'attendees';
	protected $field_names = array('id_camping', 'arrive', 'switch', 'responsible');
	protected $grid_fields = 'cum, id_camping, arrive, switch, responsible';

	public function __construct()
	{
		parent::__construct();
	}

}

/* End of file Attendee.php */
/* Location: ./application/models/Attendee.php */
