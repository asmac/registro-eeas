<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Create_Attendees extends CI_Migration {

	public function up()
	{
		$attributes = array('DEFAULT CHARSET' => 'utf8');

		$fields = array(
			"`cum` varchar(10) NOT NULL PRIMARY KEY",
			"`id_camping` int(9) NOT NULL DEFAULT 0",
			"`arrive` datetime DEFAULT NULL",
			"`switch` varchar(10) NOT NULL DEFAULT ''",
			"`responsible` varchar(10) NOT NULL DEFAULT ''"
		);

		$this->dbforge->add_field($fields);
		$this->dbforge->create_table('attendees', TRUE, $attributes);
	}

	public function down()
	{
		$this->dbforge->drop_table('attendees');
	}

}
