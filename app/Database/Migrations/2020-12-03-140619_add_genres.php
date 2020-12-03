<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddGenres extends Migration
{
	public function up()
	{
		$this->forge->addField(
			[
				'genre_id' 			 => [
					'type' 		 	 => 'INT',
					'constraint' 	 => 11,
					'unsigned' 		 => true,
					'auto_incrememt' => true,
				],
				'name' 			 => [
					'type' 		 => 'VARCHAR',
					'constraint' => 255,
				],
				'system_name' 	 => [
					'type' 	 	 => 'VARCHAR',
					'constraint' => 255,
				]
			]
		);	

		$this->forge->addKey('genre_id');
		$this->forge->addUniqueKey('system_name');
		$this->forge->createTable('genres');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('genres');
	}
}
