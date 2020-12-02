<?php 

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddSettings extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'setting_id' => [
				'type' 			 => 'INT',
				'constraint' 	 => 11,
				'auto_increment' => true,
				'unsigned'		 => true
			],
			'name' => [
				'type'  	 => 'varchar',
				'constraint' => 255,
			],
			'value' => [
				'type' => 'text',
				'null' => true,
			],
		]);

		$this->forge->addKey('setting_id');
		$this->forge->createTable('settings');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('settings');
	}
}
