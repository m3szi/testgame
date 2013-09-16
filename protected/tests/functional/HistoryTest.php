<?php

class HistoryTest extends WebTestCase
{
	public $fixtures=array(
		'histories'=>'History',
	);

	public function testShow()
	{
		$this->open('?r=history/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=history/create');
	}

	public function testUpdate()
	{
		$this->open('?r=history/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=history/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=history/index');
	}

	public function testAdmin()
	{
		$this->open('?r=history/admin');
	}
}
