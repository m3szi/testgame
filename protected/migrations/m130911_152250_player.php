<?php

class m130911_152250_player extends CDbMigration
{
	public function up()
	{
	
		$this->createTable(
				'player',
				array(
						'ID'            => 'pk',
						'clubID'		=> 'int',
						'name'         => 'varchar(125)',
						'age'			=> 'int',
						'nation'          => 'varchar(2)',
				),
				'ENGINE=InnoDB CHARSET=utf8'
		);
	
	}

	public function down()
	{
		$this->dropTable( 'player' );
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}