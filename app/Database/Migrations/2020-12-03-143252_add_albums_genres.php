<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddAlbumsGenres extends Migration
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
				'genre_id' => [
					'type' => 'INT',
					'constraint' => 11,
					'unsigned' => true,
				]
			]
		);

		# Add primary keys
		$this->forge->addKey('album_id', TRUE);
		$this->forge->addKey('genre_id', TRUE);

		# Add Unique keys
		$this->forge->addUniqueKey(['album_id', 'genre_id']);

		$this->forge->createTable('albums_genres');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('albums_genres');
	}
}
