<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Attendee extends MY_Model {

	protected $_id         = 'cum';
	protected $_table      = 'attendees';
	protected $field_names = array('id_camping', 'arrive', 'switch', 'responsible');
	protected $pre_get     = array('relations');
	protected $grid_fields = 'cum, id_camping, arrive, switch, responsible';

	public function __construct()
	{
		parent::__construct();
	}

	protected function relations($id = '')
	{
		$this->db->select('id_camping, arrive, switch, responsible, campings.name, regnal.*');
		$this->db->join('campings', 'campings.id = attendees.id_camping', 'left');
		$this->db->join('regnal', 'regnal.cum = attendees.cum', 'left');
		$this->_id = 'attendees.cum';
		return $id;
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

		$this->db->simple_query("UPDATE campings SET occupation = (SELECT COUNT(cum) FROM attendees WHERE attendees.id_camping = campings.id) WHERE id = {$camping}");
	}

	public function payment_change($original, $new)
	{
		$this->db->set('cum', $new)
				 ->set('switch', $original)
				 ->where('cum', $original)
				 ->update($this->_table);
	}

	public function is_registered($cum)
	{
		$rows = $this->db->where('cum', $cum)->where('id_camping !=', 0)->count_all_results($this->_table);
		return ($rows == 0) ? FALSE:TRUE;
	}

	public function find_registered($cum)
	{
		$query = $this->db->select('cum')->where('cum', $cum)->where('responsible', '')->where('id_camping !=', 0)->get($this->_table, 1);

		if ($query->num_rows() == 1) {
			$row = $query->row();
			return $row->cum;
		}

		$query = $this->db->select('responsible')->where('cum', $cum)->where('id_camping !=', 0)->get($this->_table, 1);

		if ($query->num_rows() == 1) {
			$row = $query->row();
			return $row->responsible;
		}

		return FALSE;
	}

	public function change_camping($cum, $camping)
	{
		$this->db->set('id_camping', $camping)->where('cum', $cum)->or_where('responsible', $cum)->update($this->_table);
		return $this->db->affected_rows();
	}

	public function change_responsible($old, $new)
	{
		$data = $this->db->where('cum', $old)->get($this->_table, 1)->row();
		$this->db->set('id_camping', $data->id_camping)
				 ->set('arrive', 'NOW()', FALSE)
				 ->where('cum', $new)
				 ->update($this->_table);

		$this->db->set('responsible', $new)
				 ->where('responsible', $old)
				 ->update($this->_table);

		$this->db->set('id_camping', '0')
				 ->set('arrive', NULL)
				 ->where('cum', $old)
				 ->update($this->_table);
	}

	public function has_elements($cum)
	{
		$count = $this->db->where('responsible', $cum)->count_all_results($this->_table);
		return ($count > 0) ? TRUE:FALSE;
	}

	public function add_element($responsible, $cum, $camping)
	{
		$this->db->set('arrive', 'NOW()', FALSE)
					 ->set('id_camping', $camping)
					 ->set('responsible', $responsible)
					 ->where('cum', $cum)
					 ->update($this->_table);

		return $this->get($cum)->row_array();
	}

}

/* End of file Attendee.php */
/* Location: ./application/models/Attendee.php */
