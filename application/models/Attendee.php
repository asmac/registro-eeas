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

	public function register($responsible, $elements, $camping)
	{
		$this->db->set('arrive', 'NOW()', FALSE)
				 ->set('id_camping', $camping)
				 ->where('cum', $responsible)
				 ->update($this->_table);

		if (is_array($elements)) {
			$this->db->set('arrive', 'NOW()', FALSE)
					 ->set('id_camping', $camping)
					 ->set('responsible', $responsible)
					 ->where_in('cum', $elements)
					 ->update($this->_table);
		}

		$num = $this->db->where('id_camping', $camping)->count_all_results('attendees');
		$this->db->set('occupation', $num)->where('id', $camping)->update('campings');
	}

	public function payment_change($original, $new)
	{
		$this->db->set('cum', $new)
				 ->set('switch', $original)
				 ->where('cum', $original)
				 ->update($this->_table);
	}

}

/* End of file Attendee.php */
/* Location: ./application/models/Attendee.php */
