<?php

class m130911_153401_club extends CDbMigration
{
	public function up()
	{
	
		$this->createTable(
				'club',
				array(
						'ID'            => 'pk',
						'name'         => 'varchar(125)',
						'age'			=> 'int(4)',
				),
				'ENGINE=InnoDB CHARSET=utf8'
		);
	
	}

	public function down()
	{
		$this->dropTable( 'club' );
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