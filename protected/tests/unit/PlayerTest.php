<?php

class PlayerTest extends CDbTestCase
{
	protected $object;
	
    protected function setUp()
    {
        parent::setUp();
        $this->object = new Player;
    }

    protected function tearDown()
    {
        unset($this->object);
    }

	public $fixtures=array(
		'players'=>'Player',
	);

	public function testModel()
    {
        $this->assertInstanceOf('Player', $this->object);
        $this->assertEquals('player', $this->object->tableName());
    }
	
	public function testRules()
    {
        $this->assertInternalType('array', $this->object->rules());
    }
	
	public function testInsert()
    {
		$this->object->setAttributes(array(
			'clubID'=>'1',
			'name'=>'Playerx',
			'age'=>26,
			'nation'=>'en'
		));
		$this->assertTrue($this->object->save());
    }
}