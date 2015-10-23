<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Create_Regnal extends CI_Migration {

	public function up()
	{
		$attributes = array('DEFAULT CHARSET' => 'utf8');

		$fields = array(
			"`cum` varchar(10) NOT NULL PRIMARY KEY",
			"`nombre` varchar(255) NOT NULL DEFAULT ''",
			"`provincia` varchar(100) NOT NULL DEFAULT ''",
			"`localidad` varchar(100) NOT NULL DEFAULT ''",
			"`grupo` int(11) NOT NULL DEFAULT '0'",
			"`nivel` varchar(50) NOT NULL DEFAULT ''",
			"`vigencia` date NOT NULL",
			"`nacimiento` date DEFAULT NULL"
		);

		$this->dbforge->add_field($fields);
		$this->dbforge->create_table('regnal', TRUE, $attributes);
	}

	public function down()
	{
		$this->dbforge->drop_table('regnal');
	}
}
