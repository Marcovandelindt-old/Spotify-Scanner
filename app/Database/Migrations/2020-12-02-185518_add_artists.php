<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddArtists extends Migration
{
	public function up()
	{
		$this->forge->addField(
			[
				'track_id' => [
					'type' 			 => 'INT',
					'constraint' 	 => 11,
					'unsigned' 		 => true,
					'auto_increment' => true,
				],
				'spotify_id' => [
					'type' 		 => 'VARCHAR',
					'constraint' => 255,
				],
				'name' => [
					'type' 		 => 'VARCHAR',
					'constraint' => 255,
				],
				'followers' => [
					'type' 		 => 'INT',
					'constraint' => 11,
					'null' 		 => true,
				],
				'image' => [
					'type' 		 => 'VARCHAR',
					'constraint' => 255,
					'null' 		 => true,
				],
				'popularity' => [
					'type'  	 => 'INT',
					'constraint' => 3,
					'null' 	 	 => true,
				],
			]
		);	

		$this->forge->addKey('track_id');
		$this->forge->addUniqueKey('spotift_id');
		$this->forge->createTable('artists');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('artists');
	}
}
