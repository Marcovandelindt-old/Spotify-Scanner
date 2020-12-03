<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddTracksArtists extends Migration
{
	public function up()
	{
		$this->forge->addField(
			[
				'track_id' => [
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
		$this->forge->addKey('track_id', TRUE);
		$this->forge->addKey('artist_id', TRUE);

		# Add Unique keys
		$this->forge->addUniqueKey(['track_id', 'artist_id']);

		

		$this->forge->createTable('tracks_artists');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('tracks_artists');
	}
}
