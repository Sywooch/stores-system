<?php

use yii\db\Schema;
use yii\db\Migration;

class m150610_100715_create_coordinates_table extends Migration
{
	public function up()
	{
		$this->createTable('coordinates', [
			'id' => Schema::TYPE_PK,
			'lat' => Schema::TYPE_DECIMAL . '(10,7)',
			'lng' => Schema::TYPE_DECIMAL . '(10,7)',
		]);
	}

	public function down()
	{
		$this->delete('coordinates');
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
