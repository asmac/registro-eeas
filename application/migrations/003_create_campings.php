<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Create_Campings extends CI_Migration {

	public function up()
	{
		$attributes = array('DEFAULT CHARSET' => 'utf8');

		$fields = array(
			"`id` int(9) NOT NULL AUTO_INCREMENT PRIMARY KEY",
			"`name` varchar(50) NOT NULL DEFAULT ''",
			"`occupation` int(100) NOT NULL DEFAULT 0"
		);

		$this->dbforge->add_field($fields);
		$this->dbforge->create_table('campings', TRUE, $attributes);
	}

	public function down()
	{
		$this->dbforge->drop_table('campings');
	}
}
