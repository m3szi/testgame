<?php

class PlayerTest extends WebTestCase
{
	public $fixtures=array(
		'players'=>'Player',
	);

	public function testShow()
	{
		$this->open('?r=player/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=player/create');
	}

	public function testUpdate()
	{
		$this->open('?r=player/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=player/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=player/index');
	}

	public function testAdmin()
	{
		$this->open('?r=player/admin');
	}
}
