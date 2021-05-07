<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TablePost extends Migration
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
			'UserId' => [
				'type'           => 'INT',
				'constraint'     => 5
			],
			'Title' => [
				'type'			=> 'TEXT',
				'null'			=> false
			],
			'Body'	=> [
				'type'			=> 'TEXT'
			],
			'Gambar'=> [
				'type'			=> 'TEXT'
			] 
		]);
		$this->forge->addPrimaryKey('id');
		$this->forge->createTable('Table_post');
	}

	public function down()
	{
		$this->forge->dropTable('Table_post');
	}
}
