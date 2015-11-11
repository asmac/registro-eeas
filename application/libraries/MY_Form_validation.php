<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Form_validation extends CI_Form_validation {

	public function mysql_date($str)
	{
		$pattern = '/([1-3][0-9]{3,3})-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/i';
        return (preg_match($pattern, $str) === 1) ? TRUE:FALSE;
	}

	public function registered($str)
	{
		$ci =& get_instance();
		$results = $ci->db->where('cum', $str)
						->where('vigencia >= CURRENT_DATE', '', FALSE)
						->limit(1)
						->count_all_results('regnal');

		return ($results > 0) ? TRUE:FALSE;
	}

	public function paid($str)
	{
		$ci =& get_instance();
		$results = $ci->db->where('cum', $str)
						->limit(1)
						->count_all_results('attendees');

		return ($results > 0) ? TRUE:FALSE;
	}

	public function legal_age($str)
	{
		$ci  =& get_instance();
		$row = $ci->db->select('TIMESTAMPDIFF( YEAR, nacimiento, CURDATE( ) ) AS age', FALSE)
						->where('cum', $str)
						->limit(1)
						->get('regnal')
						->row();

		return ($row->age >= 18) ? TRUE:FALSE;
	}

	public function already_in($str)
	{
		$ci  =& get_instance();
		$row = $ci->db->where('cum', $str)
					  ->where('id_camping', 0)
					  ->limit(1)
					  ->count_all_results('attendees');

		return ($row == 1) ? TRUE:FALSE;
	}

}

/* End of file MY_Form_validation.php */
/* Location: ./application/libraries/MY_Form_validation.php */
