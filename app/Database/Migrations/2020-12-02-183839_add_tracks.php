<?php 

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddTracks extends Migration
{
	public function up()
	{
		$this->forge->addField(
			[
				'track_id' 	 		 => [
					'type' 			 => 'INT',
					'constraint' 	 => 11,
					'unsigned' 	 	 => true,
					'auto_increment' => true,
				],
				'spotify_id' 	 => [
					'type' 		 => 'VARCHAR',
					'constraint' => 255,
				],
				'name' 			 => [
					'type' 		 => 'VARCHAR',
					'constraint' => 255,
				],
				'disc_number' 	 => [
					'type' 		 => 'INT',
					'constraint' => 11,
				],
				'duration_ms' 	 => [
					'type' 		 => 'INT',
					'constraint' => 11,
				],
				'popularity' 	 => [
					'type' 		 => 'INT',
					'constraint' => 3
				],
			]
		);	

		$this->forge->addKey('track_id');
		$this->forge->addUniqueKey('spotify_id');
		$this->forge->createTable('tracks');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('tracks');
	}
}
