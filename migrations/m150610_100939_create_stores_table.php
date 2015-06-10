<?php

use yii\db\Schema;
use yii\db\Migration;

class m150610_100939_create_stores_table extends Migration
{
	public function up()
	{
		$this->createTable('stores', [
			'id' => Schema::TYPE_PK,
			'coordinate_id' => Schema::TYPE_INTEGER,
			'name' => Schema::TYPE_STRING,
			'description' => Schema::TYPE_TEXT,
		]);
	}

	public function down()
	{
		$this->delete('stores');
	}

	/*
	// Use safeUp/safeDown to run migration code within a transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}
