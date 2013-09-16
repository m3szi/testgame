<?php

class ClubTest extends CDbTestCase
{

	protected $object;
	
    protected function setUp()
    {
        parent::setUp();
        $this->object = new Club;
    }

    protected function tearDown()
    {
        unset($this->object);
    }

	public $fixtures=array(
		'clubs'=>'Club',
	);

	public function testModel()
    {
        $this->assertInstanceOf('Club', $this->object);
        $this->assertEquals('club', $this->object->tableName());
    }
	
	public function testRules()
    {
        $this->assertInternalType('array', $this->object->rules());
    }
	
	public function testInsert()
    {
		$this->object->setAttributes(array(
			'name'=>'Clubx',
			'age'=>21,
		));
		$this->assertTrue($this->object->save());
    }
}