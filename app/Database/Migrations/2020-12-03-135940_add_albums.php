<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddAlbums extends Migration
{
	public function up()
	{
		$this->forge->addField(
			[
				'album_id' => [
					'type' 			 => 'INT',
					'constraint' 	 => 11,
					'unsigned' 		 => true,
					'auto_increment' => true,
				],
				'spotify_id' => [
					'type' => 'VARCHAR',
					'constraint' => 255,
				],
				'name' => [
					'type' => 'VARCHAR',
					'constraint' => 255,
				],
				'type' => [
					'type' => 'VARCHAR',
					'constraint' => 255,
				],
				'copyrights' => [
					'type' => 'VARCHAR',
					'constraint' => 255,
					'null' => true,
				],
				'image' => [
					'type' => 'VARCHAR',
					'constraint' => 255,
					'null' => true,
				],
				'popularity' => [
					'type' => 'INT',
					'constraint' => 3,
					'null' => true,
				],
				'release_date' => [
					'type' => 'VARCHAR',
					'constraint' => 255,
				],
			]
		);	

		$this->forge->addKey('album_id');
		$this->forge->addUniqueKey('spotify_id');
		$this->forge->createTable('albums');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('albums');	
	}
}
