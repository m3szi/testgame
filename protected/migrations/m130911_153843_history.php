<?php

class m130911_153843_history extends CDbMigration
{
	public function up()
	{
	
		$this->createTable(
				'history',
				array(
						'ID'            => 'pk',
						'playerID'      => 'int',
						'from'          => 'int',
						'to'			=> 'int',
						'date'			=> 'datetime',
						'amount'		=> 'int'
				),  
				'ENGINE=InnoDB CHARSET=utf8'
		);
		
		$this->createIndex('playerID', 'history', 'playerID');
		$this->createIndex('from', 'history', 'from');
		$this->createIndex('to', 'history', 'to');
		
		$this->addForeignKey('fk_history_playerID', 'history', 'playerID', 'player', 'ID','RESTRICT','RESTRICT');
		$this->addForeignKey('fk_history_from', 'history', 'from', 'club', 'ID','RESTRICT','RESTRICT');
		$this->addForeignKey('fk_history_to', 'history', 'to', 'club', 'ID','RESTRICT','RESTRICT');
	
	}

	public function down()
	{
		$this->dropTable( 'history' );
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