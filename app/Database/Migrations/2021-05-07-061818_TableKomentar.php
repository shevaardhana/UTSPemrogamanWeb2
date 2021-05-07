<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TableKomentar extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => true,
				'auto_increment' => true
			],
			'PostId' => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => true
			],
			'Name'	=> [
				'type' => 'TEXT'
			],
			'Email' => [
				'type' => 'TEXT'
			],
			'Body'	=> [
				'type' => 'TEXT'
			]
		]);
		$this->forge->addPrimaryKey('id');
		$this->forge->addForeignKey('PostId', 'Table_post', 'id', 'CASCADE', 'CASCADE');
		$this->forge->createTable('Table_Komentar');
	}

	public function down()
	{
		$this->forge->dropTable('Table_Komentar');
	}
}
