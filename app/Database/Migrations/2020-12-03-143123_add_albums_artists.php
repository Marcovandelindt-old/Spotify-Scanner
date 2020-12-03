<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddAlbumsArtists extends Migration
{
	public function up()
	{
		$this->forge->addField(
			[
				'album_id' => [
					'type' 		 => 'INT',
					'constraint' => 11,
					'unsigned' => true,
				],
				'artist_id' => [
					'type' => 'INT',
					'constraint' => 11,
					'unsigned' => true,
				]
			]
		);

		# Add primary keys
		$this->forge->addKey('album_id', TRUE);
		$this->forge->addKey('artist_id', TRUE);

		# Add Unique keys
		$this->forge->addUniqueKey(['album', 'artist_id']);

		$this->forge->createTable('albums_artists');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('albums_artists');
	}
}
