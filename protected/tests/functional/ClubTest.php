<?php

class ClubTest extends WebTestCase
{
	public $fixtures=array(
		'clubs'=>'Club',
	);

	public function testShow()
	{
		$this->open('?r=club/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=club/create');
	}

	public function testUpdate()
	{
		$this->open('?r=club/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=club/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=club/index');
	}

	public function testAdmin()
	{
		$this->open('?r=club/admin');
	}
}
